<?php

namespace Rahamatj\Kaiju\Tests;

use Carbon\Carbon;
use Rahamatj\Kaiju\FileParser;
use Orchestra\Testbench\TestCase;

class FileParserTest extends TestCase
{
    /** @test */
    public function the_head_and_body_gets_split()
    {
        $fileParser = (new FileParser(__DIR__ . '/../blogs/MarkFile1.md'));

        $data = $fileParser->getRawData();

        $this->assertStringContainsString('title: My title', $data[1]);
        $this->assertStringContainsString('description: My description', $data[1]);
        $this->assertStringContainsString('Blog post body', $data[2]);
    }

    /** @test */
    public function each_head_field_gets_separated()
    {
        $fileParser = (new FileParser(__DIR__ . '/../blogs/MarkFile1.md'));

        $data = $fileParser->getData();

        $this->assertEquals('My title', $data['title']);
        $this->assertEquals('My description', $data['description']);
    }

    /** @test */
    public function a_string_can_also_be_used_instead()
    {
        $fileParser = (new FileParser("---\ntitle: My title\n---\nBlog post body"));

        $data = $fileParser->getRawData();

        $this->assertStringContainsString('title: My title', $data[1]);
        $this->assertStringContainsString('Blog post body', $data[2]);
    }

    /** @test */
    public function a_date_field_gets_parsed()
    {
        $fileParser = (new FileParser("---\ndate: May 14, 1988\n---\n"));

        $data = $fileParser->getData();

        $this->assertInstanceOf(Carbon::class, $data['date']);
        $this->assertEquals('05/14/1988', $data['date']->format('m/d/Y'));
    }

    /** @test */
    public function the_body_gets_saved_and_trimmed()
    {
        $fileParser = (new FileParser(__DIR__ . '/../blogs/MarkFile1.md'));

        $data = $fileParser->getData();

        $this->assertEquals("<h1>Heading</h1>\n<p>Blog post body</p>", $data['body']);
    }

    /** @test */
    public function an_extra_field_gets_saved()
    {
        $fileParser = (new FileParser("---\nauthor: John Doe\n---\n"));

        $data = $fileParser->getData();

        $this->assertEquals(json_encode(['author' => 'John Doe']), $data['extra']);
    }

    /** @test */
    public function multiple_extra_fields_gets_saved()
    {
        $fileParser = (new FileParser("---\nauthor: John Doe\nimage: some/image.jpg\n---\n"));

        $data = $fileParser->getData();

        $this->assertEquals(json_encode(['author' => 'John Doe', 'image' => 'some/image.jpg']), $data['extra']);
    }
}