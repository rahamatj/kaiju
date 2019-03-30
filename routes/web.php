<?php

Route::get('/', 'HomeController@index')->name('/');
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/post/{post}', 'BlogController@show')->name('blog.show');

if(config('kaiju.projects'))
{
    Route::get('projects', 'ProjectsController@index')->name('projects');
    Route::get('projects/{post}', 'ProjectsController@show')->name('projects.show');
}

if(config('kaiju.about'))
{
    Route::get('about', 'AboutController@index')->name('about');
}

Route::get('kaiju/roar', 'RoarController@index')->name('kaiju.roar');