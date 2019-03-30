<?php

Route::get('/', 'HomeController@index')->name('/');
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('/blog/post/{post}', 'BlogController@show')->name('blog.show');