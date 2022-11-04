<?php

namespace Renatio\SeoManager\Classes;

use Facades\Renatio\SeoManager\Classes\SeoFields;
use RainLab\Pages\Classes\Page;

/**
 * Class SeoStaticPage
 * @package Renatio\SeoManager\Classes
 */
class SeoStaticPage extends SeoCmsPage
{

    /**
     * @var string
     */
    protected $pageType = Page::class;

    /**
     * @var string
     */
    protected $pageKey = 'viewBag';

    /**
     * @return array
     */
    protected function keys()
    {
        return collect(SeoFields::fields())
            ->keys()
            ->map(function ($key) {
                return str_replace('seo_tag', $this->pageKey, $key);
            })
            ->all();
    }
}
