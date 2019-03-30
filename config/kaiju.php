<?php

return [
    // your url: https://name.com
    'url' => 'https://name.com',

    // set the install-route to false after you're done installing.
    'install-route' => true, 

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

    // if you don't need projects, set 'projects' to false below
    'projects' => true,

    // about file path
    'about' => 'kaiju/about.md',

    // If you want to include your resume, set to true
    // and specify source (external or local).
    'resume' => true,
    'resume-external' => true,
    'resume-url' => 'https://google.com/?q=my+resume',

    // driver to load blogs
    'driver' => 'file',
    
    // package route prefix
    'route-prefix' => '/',
    
    // driver configurations
    'file' => [
        'path' => 'kaiju/posts'
    ]
];