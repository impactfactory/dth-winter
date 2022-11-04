<?php

namespace Renatio\SeoManager\Components;

use Cms\Classes\ComponentBase;
use Event;
use Facades\Renatio\SeoManager\Classes\SeoFields;
use Model;
use Renatio\SeoManager\Models\SeoTag;
use Renatio\SeoManager\Models\Settings;

/**
 * Class SeoTags
 * @package Renatio\SeoManager\Components
 */
class SeoTags extends ComponentBase
{

    /**
     * @var
     */
    public $seoTag;

    /**
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name' => 'renatio.seomanager::lang.component.name',
            'description' => 'renatio.seomanager::lang.component.description',
        ];
    }

    /**
     * @return void
     */
    public function onRender()
    {
        $this->seoTag = $this->findSeoTagInController();

        if (!$this->seoTag) {
            $this->seoTag = $this->page;
        }

        $this->prepareSeoTag();

        Event::fire('seo.beforeComponentRender', [$this, $this->page]);

        $this->setPageVars();
    }

    /**
     * @return mixed
     */
    protected function findSeoTagInController()
    {
        foreach ($this->controller->vars as $var) {
            if (!($var instanceof Model)) {
                continue;
            }

            $where = [
                'seo_tag_id' => $var->id,
                'seo_tag_type' => get_class($var),
            ];

            if ($seoTag = SeoTag::where($where)->first()) {
                return $seoTag;
            }
        }

        return false;
    }

    /**
     * @return void
     */
    protected function setPageVars()
    {
        $this->page['seoTag'] = $this->seoTag;
        $this->page['currentUrl'] = request()->path();
        $this->page['seoSettings'] = Settings::instance();
    }

    /**
     * @return void
     */
    protected function prepareSeoTag()
    {
        $this->setOgImageDimensions();

        $this->setRobots();

        $this->setDefaults();
    }

    /**
     * @return void
     */
    protected function setOgImageDimensions()
    {
        $this->seoTag->og_image_width = null;
        $this->seoTag->og_image_height = null;

        $filePath = base_path(config('cms.storage.media.path').$this->seoTag->og_image);

        if (is_file($filePath)) {
            list($width, $height) = getimagesize($filePath);

            $this->seoTag->og_image_width = $width;
            $this->seoTag->og_image_height = $height;
        }
    }

    /**
     * @return void
     */
    protected function setRobots()
    {
        $this->seoTag->robots = (optional($this->seoTag)->robot_index ?? 'index')
            .', '
            .(optional($this->seoTag)->robot_follow ?? 'follow');

        if (optional($this->seoTag)->robot_advanced) {
            $this->seoTag->robots .= ', '.$this->seoTag->robot_advanced;
        }
    }

    /**
     * @return void
     */
    protected function setDefaults()
    {
        foreach (SeoFields::keys() as $key) {
            if (empty($this->seoTag->$key)) {
                $this->seoTag->$key = '';
            }
        }
    }
}
