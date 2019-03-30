<?php

return [
    // your url: https://name.com
    'url' => 'https://koppl.in/indigo',

    // main text of home
    'name' => 'John Doe',
    
    // bio of home
    'bio' => 'A Man who travels the world eating noodles',

    // picture of home
    // if it's an external image, update below for true
    // better with square images
    'external-image' => false,
    'picture' => 'images/profile.jpg',

    // twitter summary info
    'description' => 'A blog about technology and stuff related',

    'socials' => [
        'facebook' => 'myfacebook',
        'twitter' => 'mytwitter',
        // 'google' => 'mygoogle',
        // 'instagram' => 'myinstagram',
        // 'pinterest' => 'mypinterest',
        // 'linkedin' => 'mylinkedin',
        // 'youtube' => 'myyoutube',
        // 'spotify' => 'myspotify',
        'github' => 'mygithub',
        // 'gitlab' => 'mygitlab',
        // 'lastfm' => 'mylastfm',
        // 'stackoverflow' => '7044681/mystackoverflow',
        // 'quora' => 'userquora',
        // 'reddit' => 'username',
        'medium' => 'medium',
        // 'vimeo' => 'myvimeo',
        // 'lanyrd' => 'mylanyrd',
        'email' => 'myemail@gmail.com',
    ],

    // driver to load blogs
    'driver' => 'file',
    
    // package route prefix
    'route-prefix' => '/',
    
    // driver configurations
    'file' => [
        'path' => 'blogs'
    ]
];