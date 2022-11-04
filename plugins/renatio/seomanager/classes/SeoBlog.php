<?php

namespace Renatio\SeoManager\Classes;

use RainLab\Blog\Models\Category;
use RainLab\Blog\Models\Post;
use Renatio\SeoManager\Behaviors\SeoModel;
use Renatio\SeoManager\Models\SeoTag;
use System\Classes\PluginManager;

/**
 * Class SeoBlog
 * @package Renatio\SeoManager\Classes
 */
class SeoBlog
{

    /**
     * @return void
     */
    public function extend()
    {
        if (!PluginManager::instance()->exists('RainLab.Blog')) {
            return;
        }

        $this->extendModels();

        $this->saveDefaultValues();
    }

    /**
     * @return void
     */
    protected function extendModels()
    {
        $this->extendPostModel();

        $this->extendCategoryModel();
    }

    /**
     * @return void
     */
    protected function extendPostModel()
    {
        Post::extend(function ($model) {
            $model->implement[] = SeoModel::class;

            $model->addDynamicMethod('getSeoTab', function () {
                return 'secondary';
            });
        });
    }

    /**
     * @return void
     */
    protected function extendCategoryModel()
    {
        Category::extend(function ($model) {
            $model->implement[] = SeoModel::class;
        });
    }

    /**
     * @return void
     */
    protected function saveDefaultValues()
    {
        $this->saveDefaultValuesForPost();

        $this->saveDefaultValuesForCategory();
    }

    /**
     * @return void
     */
    protected function saveDefaultValuesForPost()
    {
        Post::extend(function ($model) {
            $model->bindEvent('model.afterSave', function () use ($model) {
                $seoTag = $model->seo_tag ?? new SeoTag;

                if (empty($model->seo_tag->meta_title)) {
                    $seoTag->meta_title = str_limit($model->title, 191, '');
                }

                if (empty($model->seo_tag->meta_description)) {
                    $seoTag->meta_description = !empty($model->excerpt)
                        ? str_limit($model->excerpt, 300, '')
                        : str_limit($model->content, 300, '');
                }

                $model->seo_tag()->save($seoTag);
            });
        });
    }

    /**
     * @return void
     */
    protected function saveDefaultValuesForCategory()
    {
        Category::extend(function ($model) {
            $model->bindEvent('model.afterSave', function () use ($model) {
                $seoTag = $model->seo_tag ?? new SeoTag;

                if (empty($model->seo_tag->meta_title)) {
                    $seoTag->meta_title = str_limit($model->name, 191, '');
                }

                if (empty($model->seo_tag->meta_description)) {
                    $seoTag->meta_description = str_limit($model->name, 300, '');
                }

                $model->seo_tag()->save($seoTag);
            });
        });
    }
}
