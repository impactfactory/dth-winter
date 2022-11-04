<?php

namespace Renatio\SeoManager\Classes;

use Event;
use Renatio\SeoManager\Models\Settings;
use Yaml;

/**
 * Class SeoFields
 * @package Renatio\SeoManager\Classes
 */
class SeoFields
{

    /**
     * @return array
     */
    public function fields()
    {
        $fields = $this->seoFields();

        if ($this->isOpenGraphEnabled()) {
            $fields += $this->ogFields();
        }

        return $fields;
    }

    /**
     * @return array
     */
    public function keys()
    {
        return collect(
            array_keys($this->fields())
        )
            ->map(function ($key) {
                preg_match('/seo_tag\[(.+)]/', $key, $matches);

                return $matches[1];
            })
            ->all();
    }

    /**
     * @return bool
     */
    protected function isOpenGraphEnabled()
    {
        return Settings::get('og_enabled');
    }

    /**
     * @return array
     */
    protected function seoFields()
    {
        $fields = Yaml::parseFile(__DIR__.'/../models/seotag/fields.yaml');

        return Event::fire('seo.extendSeoFields', [$fields], true) ?: $fields;
    }

    /**
     * @return array
     */
    protected function ogFields()
    {
        $fields = Yaml::parseFile(__DIR__.'/../models/seotag/og_fields.yaml');

        return Event::fire('seo.extendOgFields', [$fields], true) ?: $fields;
    }
}
