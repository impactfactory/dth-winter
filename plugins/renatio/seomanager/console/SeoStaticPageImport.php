<?php

namespace Renatio\SeoManager\Console;

use Illuminate\Console\Command;
use RainLab\Pages\Classes\Page;
use System\Classes\PluginManager;

/**
 * Class SeoStaticPageImport
 * @package Renatio\SeoManager\Console
 */
class SeoStaticPageImport extends Command
{

    /**
     * @var string
     */
    protected $signature = 'seo:import-static';

    /**
     * @var string
     */
    protected $description = 'Import Static Pages SEO';

    /**
     * @return void
     */
    public function handle()
    {
        if (!PluginManager::instance()->exists('RainLab.Pages')) {
            return;
        }

        foreach (Page::all() as $page) {
            $viewBag = $page->viewBag;

            $viewBag['meta_title'] = $viewBag['meta_title'] ?? $page->title;
            $viewBag['meta_description'] = $viewBag['meta_description'] ?? $page->title;
            $viewBag['robot_index'] = $viewBag['robot_index'] ?? 'index';
            $viewBag['robot_follow'] = $viewBag['robot_follow'] ?? 'follow';

            $data['settings'] = ['viewBag' => $viewBag];

            $page->fill($data);
            $page->forceSave();
        }
    }
}
