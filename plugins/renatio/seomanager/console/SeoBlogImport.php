<?php

namespace Renatio\SeoManager\Console;

use Illuminate\Console\Command;
use RainLab\Blog\Models\Category;
use RainLab\Blog\Models\Post;
use Renatio\SeoManager\Models\SeoTag;
use System\Classes\PluginManager;

/**
 * Class SeoBlogImport
 * @package Renatio\SeoManager\Console
 */
class SeoBlogImport extends Command
{

    /**
     * @var string
     */
    protected $signature = 'seo:import-blog';

    /**
     * @var string
     */
    protected $description = 'Import Blog SEO';

    /**
     * @return void
     */
    public function handle()
    {
        if (!PluginManager::instance()->exists('RainLab.Blog')) {
            return;
        }

        $this->importPosts();
        $this->importCategories();
    }

    /**
     * @return void
     */
    protected function importPosts()
    {
        Post::all('id', 'title', 'excerpt')
            ->each(function ($post) {
                SeoTag::firstOrCreate([
                    'seo_tag_id' => $post->id,
                    'seo_tag_type' => Post::class,
                ], [
                    'meta_title' => str_limit($post->title, 255, null),
                    'meta_description' => str_limit($post->excerpt, 255, null),
                ]);
            });
    }

    /**
     * @return void
     */
    protected function importCategories()
    {
        Category::all('id', 'name')
            ->each(function ($category) {
                SeoTag::firstOrCreate([
                    'seo_tag_id' => $category->id,
                    'seo_tag_type' => Category::class,
                ], [
                    'meta_title' => str_limit($category->name, 255, null),
                    'meta_description' => str_limit($category->name, 255, null),
                ]);
            });
    }
}
