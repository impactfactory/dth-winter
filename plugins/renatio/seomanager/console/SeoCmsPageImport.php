<?php

namespace Renatio\SeoManager\Console;

use Cms\Classes\Page;
use Illuminate\Console\Command;

/**
 * Class SeoCmsPageImport
 * @package Renatio\SeoManager\Classes
 */
class SeoCmsPageImport extends Command
{

    /**
     * @var string
     */
    protected $signature = 'seo:import-cms';

    /**
     * @var string
     */
    protected $description = 'Import CMS Pages SEO';

    /**
     * @return void
     */
    public function handle()
    {
        foreach (Page::all() as $page) {
            $page->meta_title = $page->meta_title ?? $page->title;
            $page->meta_description = $page->meta_description ?? $page->title;
            $page->robot_index = $page->robot_index ?? 'index';
            $page->robot_follow = $page->robot_follow ?? 'follow';

            $page->forceSave();
        }
    }
}
