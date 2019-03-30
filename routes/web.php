<?php

Route::get('/', 'HomeController@index')->name('/');
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('blog/post/{post}', 'BlogController@show')->name('blog.show');

if(config('kaiju.projects'))
{
    Route::get('projects', 'ProjectsController@index')->name('projects');
    Route::get('projects/{post}', 'ProjectsController@show')->name('projects.show');
}