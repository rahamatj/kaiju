<?php

if (! config('kaiju.block-installation-route')) {
    Route::get('kaiju/install', 'InstallController@install')->name('kaiju.install');
    Route::get('kaiju/migrate', 'InstallController@migrate')->name('kaiju.migrate');
}