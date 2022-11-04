<?php

namespace Renatio\SeoManager\Models;

use Model;

/**
 * Class SeoTag
 * @package Renatio\SeoManager\Models
 */
class SeoTag extends Model
{

    /**
     * @var array
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    /**
     * @var string
     */
    public $table = 'renatio_seomanager_seo_tags';

    /**
     * @var array
     */
    public $translatable = [
        'seo_tag[meta_title]',
        'seo_tag[meta_description]',
        'seo_tag[meta_keywords]',
        'seo_tag[canonical_url]',
        'seo_tag[redirect_url]',
        'seo_tag[og_title]',
        'seo_tag[og_description]',
    ];

    /**
     * @var array
     */
    public $morphTo = [
        'seo_tag' => [],
    ];
}
