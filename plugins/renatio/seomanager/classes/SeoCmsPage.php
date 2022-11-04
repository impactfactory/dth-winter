<?php

namespace Renatio\SeoManager\Classes;

use Backend\Widgets\Form;
use Cms\Classes\Page;
use Event;
use Facades\Renatio\SeoManager\Classes\SeoFields;
use System\Classes\PluginManager;

/**
 * Class SeoCmsPage
 * @package Renatio\SeoManager\Classes
 */
class SeoCmsPage
{

    /**
     * @var string
     */
    protected $pageType = Page::class;

    /**
     * @var string
     */
    protected $pageKey = 'settings';

    /**
     * @return void
     */
    public function extend()
    {
        $this->extendFields();
    }

    /**
     * @return void
     */
    protected function extendFields()
    {
        Event::listen('backend.form.extendFieldsBefore', function (Form $widget) {
            if (!$widget->model instanceof $this->pageType) {
                return;
            }

            /*
             * Handle infinite loop
             */
            if ($widget->isNested) {
                return;
            }

            Assets::add($widget->getController());

            $this->addTranslatableFields($widget->model);

            $this->addFields($widget);
        });
    }

    /**
     * @param $model
     */
    protected function addTranslatableFields($model)
    {
        if (!PluginManager::instance()->exists('RainLab.Translate')) {
            return;
        }

        $model->translatable = array_merge($model->translatable ?? [], $this->keys());
    }

    /**
     * @param  Form  $widget
     */
    protected function addFields(Form $widget)
    {
        $widget->tabs['fields'] = array_merge($widget->tabs['fields'] ?? [], $this->fields());
    }

    /**
     * @return array
     */
    protected function fields()
    {
        return collect(SeoFields::fields())
            ->mapWithKeys(function ($field, $key) {
                return [str_replace('seo_tag', $this->pageKey, $key) => $field];
            })
            ->all();
    }

    /**
     * @return array
     */
    protected function keys()
    {
        return SeoFields::keys();
    }
}
