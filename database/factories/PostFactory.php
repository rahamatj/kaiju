<?php
/**
 * Created by PhpStorm.
 * User: rahamatj
 * Date: 3/26/19
 * Time: 10:21 AM
 */

use Rahamatj\Kaiju\Post;
use Illuminate\Support\Str;

$factory->define(Post::class, function(Faker\Generator $faker) {
   return [
       'identifier' => Str::random(),
       'slug' => Str::slug($faker->sentence),
       'title' => $faker->sentence,
       'description' => $faker->paragraph,
       'body' => $faker->paragraph,
       'extra' => json_encode(['test' => 'value'])
   ];
});