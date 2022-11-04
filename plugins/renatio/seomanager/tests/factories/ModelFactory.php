<?php

use Database\Test\Models\Post;
use RainLab\Blog\Models\Category;
use RainLab\Blog\Models\Post as BlogPost;
use Renatio\SeoManager\Models\SeoTag;

$factory->define(SeoTag::class, function (Faker\Generator $faker) {
    return [
        'meta_title' => $faker->text(50),
        'meta_description' => $faker->text(150),
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(50),
        'seo_tag' => null,
    ];
});

$factory->define(BlogPost::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(50),
        'slug' => $faker->slug,
        'content' => $faker->text(150),
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(50),
    ];
});