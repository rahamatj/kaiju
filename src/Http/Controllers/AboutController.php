<?php

namespace Rahamatj\Kaiju\Http\Controllers;

use File;
use Rahamatj\Kaiju\MarkdownParser;
use Illuminate\Routing\Controller;

class AboutController extends Controller
{
    public function index()
    {
        if(File::exists(base_path(config('kaiju.about'))))
        {
            $about = MarkdownParser::parse(File::get(base_path(config('kaiju.about'))));
        }
        else
        {
            $about = MarkdownParser::parse("# " . config('kaiju.name') . "\n" . config('kaiju.bio'));
        }

        return view('kaiju::about', [
            'about' => $about
        ]);
    }
}