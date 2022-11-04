<?php

namespace Renatio\SeoManager\Behaviors;

use Event;
use Facades\Renatio\SeoManager\Classes\SeoFields;
use Model;
use Renatio\SeoManager\Classes\Assets;
use Renatio\SeoManager\Models\SeoTag;
use System\Classes\ModelBehavior;

/**
 * Class SeoModel
 * @package Renatio\SeoManager\Behaviors
 */
class SeoModel extends ModelBehavior
{

    public function __construct($model)
    {
        parent::__construct($model);

        $this->addRelation();

        $this->extendFields();
    }

    /**
     * @return void
     */
    protected function addRelation()
    {
        $this->model->morphOne['seo_tag'] = [
            SeoTag::class,
            'name' => 'seo_tag',
            'delete' => true,
        ];

        /*
         * Currently RainLab.Translate Plugin does not support morphOne relation, waiting for fix.
         */
//        $this->model->translatable = array_merge($this->model->translatable ?? [], (new SeoTag)->translatable);
    }

    /**
     * @return void
     */
    protected function extendFields()
    {
        Event::listen('backend.form.extendFieldsBefore', function ($widget) {
            if (!$this->hasSeoModelBehavior(optional($widget)->model)) {
                return;
            }

            /*
             * Handle infinite loop
             */
            if ($widget->isNested) {
                return;
            }

            /*
             * Handle pivot models
             */
            if (array_key_exists('pivot', $widget->model->getRelations())) {
                return;
            }

            Assets::add($widget->getController());

            if (!$widget->model->seo_tag) {
                $widget->model->seo_tag = new SeoTag;
            }

            $this->addFields($widget);
        });
    }

    /**
     * @param $widget
     */
    protected function addFields($widget)
    {
        if ($this->tab() == 'secondary') {
            $widget->secondaryTabs['fields'] = array_merge($widget->secondaryTabs['fields'] ?? [], SeoFields::fields());
        } else {
            $widget->tabs['fields'] = array_merge($widget->tabs['fields'] ?? [], SeoFields::fields());
        }
    }

    /**
     * @return string
     */
    protected function tab()
    {
        return $this->model->methodExists('getSeoTab') ? $this->model->getSeoTab() : 'primary';
    }

    /**
     * @param $model
     * @return bool
     */
    protected function hasSeoModelBehavior($model)
    {
        return $model instanceof Model
            && $model->isClassExtendedWith(static::class);
    }
}
