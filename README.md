# Kaiju

A markdown powered portfolio/blog package for the Laravel framework.

## Features
- Powered by [Laravel](https://laravel.com),
- Uses markdown files to create/update blogs/projects,
- Uses SQLite for database,
- Uses assets and compiled html/css from [Indigo](https://github.com/sergiokopplin/indigo).

## Set up
- `composer create-project --prefer-dist laravel/laravel blog`
- `cd blog`
- `composer require rahamatj/kaiju`
- Open the project on your browser and go to the path `/kaiju/install` and follow along.

Or,

- `php artisan kaiju:install`
- `php artisan migrate`
- `php artisan kaiju:roar`


- Set `block-installation-route` to true in the `kaiju` config file after the installation.

## How to
- Set your name, bio, picture, socials and other information in `config/kaiju.php`.
- Place images inside `public/vendor/kaiju/assets` folder and use image names with paths after `public/vendor/kaiju/assets` in your config file or markdown files. e.g. `'picture' => 'images/profile.jpg'` in your config file or `![example image](images/markdown.jpg "An exemplary image")` in your markdown files.

Use full urls in case of external images.

- Place your blog posts and projects inside `kaiju/posts` folder.
- Example `post.md`
```
---
title: My title
description: My description
---

# Hello
```
- Example `project.md`
```
---
title: My project
description: My description
is_project: true
---

# Hello
```

Projects are basically posts but has one extra field in the head section aptly named `is_project` and it needs to be set to true.

Make sure post and project titles are unique.

After adding new markdown files or updating old files run `php artisan kaiju:roar` or go to path `/kaiju/roar` to process new files or update existing posts.

- You can change the path to the markdown files in your `config/kaiju.php` file if you need to.
```
// driver configurations
'file' => [
    'path' => 'kaiju/posts'
]
```

- Use full urls for socials and uncomment the ones you need.

- If the `projects` is set to false it won't show up in the menu.

- `about` specifies the file path from where the about page gets it's contents.

- Set `resume` according to your needs.

## Extending
### Add custom fields
- Publish kaiju migrations `php artisan vendor:publish --tag=kaiju-migrations`,
- Add new fields in the migration file.
- Create a new folder inside app called `Fields` and add your new field classes here.
```
namespace App\Fields;

use Rahamatj\Kaiju\Field;

class Author extends Field
{
    // override process method or keep the class empty
    public function process($field, $value) {
        return [
            $field => $value // 'author' => $value
        ];
    }
}
```

- Publish Kaiju Service Provider `php artisan vendor:publish --tag=kaiju-provider`
- Register new field classes inside `registerFields()` method of `app/Providers/KaijuServiceProvider.php` class.
```
protected function registerFields()
{
    return [
        \App\Fields\Author::class
    ];
}
```

- Then in your `post.md` file add a new field
```
title: My title
description: My description
author: John Doe
---

# Hello
```

If you don't create or register your field classes, any new fields added in your markdown file's head section will be added to the database as a json object stored under a field called `extra`. And you can access the field like `$post->extra()->field`
```
title: My title
description: My description
author: John Doe
kaiju: roar
---

# Hello
```
```
echo $post->extra()->kaiju; // roar
```

### Override views
If you wish to override package views, place your views inside `resources/views/vendor/kaiju` folder. Follow the package's `views` folder structure.

For example, if you want to override the pagination view, simply create a new blade file called `resources/views/vendor/kaiju/includes/pagination.blade.php` and place your code there.