<?php namespace ImpactFactory\Blog;

use System\Classes\PluginBase;
use ImpactFactory\Blog\Components\PostDetail;
use ImpactFactory\Blog\Components\PostsAll;
use ImpactFactory\Blog\Components\PostsInCategory;
use ImpactFactory\Blog\Components\PostsWithTag;
use ImpactFactory\Blog\Components\TagCloud;
use ImpactFactory\Blog\Models\Post;
use ImpactFactory\Blog\Models\Category;
use ImpactFactory\Blog\Models\Tag;
use ImpactFactory\Blog\Models\Edit;
use Event;
use Log;

class Plugin extends PluginBase
{
      public function registerComponents()
      {
        return [
            PostDetail::class => 'postdetail',
            PostsAll::class => 'postsall',
            PostsInCategory::class => 'postsincategory',
            PostsWithTag::class => 'postswithtag',
            TagCloud::class => 'tagcloud'
        ];
      }

      public function registerPageSnippets()
      {
        return [
            TagCloud::class => 'tagcloud'
        ];
      }

      public function registerSettings(){}

      public function boot()
      {
        Event::listen('translate.localePicker.translateParams', function($page, $params, $oldLocale, $newLocale) {
            //Log::info($page->baseFileName);
            if ($page->baseFileName == 'blog/post-detail') {
                return Post::translateParams($params, $oldLocale, $newLocale);
            }
            if ($page->baseFileName == 'blog/postsincategory') {
                return Category::translateParams($params, $oldLocale, $newLocale);
            }
            if ($page->baseFileName == 'blog/postswithtag') {
                return Tag::translateParams($params, $oldLocale, $newLocale);
            }
        });

        Event::listen('offline.sitesearch.query', function ($query) {

            $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

            $items = Post
                ::Where('title', 'like', "%${query}%")
                ->orWhere('subtitle', 'like', "%${query}%")
                ->orWhere('excerpt', 'like', "%${query}%")
                ->orWhere('content', 'like', "%${query}%")
                ->orWhere('meta_keywords', 'like', "%${query}%")
                ->orWhere('meta_desc', 'like', "%${query}%")
                ->orWhere('meta_title', 'like', "%${query}%")
                ->orWhere('searchtags', 'like', "%${query}%")
                ->get();

            $results = $items->map(function ($item) use ($query, $controller) {

                return [
                    'title'     => $item->title,
                    'text'      => $item->excerpt,
                    'url'       => '/'.e(trans('impactfactory.blog::lang.search.locale')).'/'.e(trans('impactfactory.blog::lang.search.blogbase')).'/'.$item->slug,
                ];
            });

            return [
                'provider' => e(trans('impactfactory.blog::lang.search.provider')),
                'results'  => $results,
            ];
        });


        Event::listen('offline.sitesearch.query', function ($query) {

            $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

            $items = Tag
                ::Where('name', 'like', "%${query}%")
                ->orWhere('slug', 'like', "%${query}%")
                ->orWhere('desc', 'like', "%${query}%")
                ->orWhere('synonyms', 'like', "%${query}%")
                ->orWhere('meta_title', 'like', "%${query}%")
                ->orWhere('meta_desc', 'like', "%${query}%")
                ->orWhere('searchtags', 'like', "%${query}%")
                ->get();

            $results = $items->map(function ($item) use ($query, $controller) {

                return [
                    'title'     => $item->name,
                    'text'      => $item->desc,
                    'url'       => '/'.e(trans('impactfactory.blog::lang.search.locale')).'/'.e(trans('impactfactory.blog::lang.search.blogbase')).'/'.e(trans('impactfactory.blog::lang.search.tagbase')).'/'.$item->slug,
                ];
            });

            return [
                'provider' => e(trans('impactfactory.blog::lang.search.provider_tagpages')),
                'results'  => $results,
            ];
        });

        Event::listen('offline.sitesearch.query', function ($query) {

            $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();

            $items = Category
                ::Where('name', 'like', "%${query}%")
                ->orWhere('slug', 'like', "%${query}%")
                ->orWhere('desc', 'like', "%${query}%")
                ->orWhere('synonyms', 'like', "%${query}%")
                ->orWhere('meta_title', 'like', "%${query}%")
                ->orWhere('meta_desc', 'like', "%${query}%")
                ->orWhere('searchtags', 'like', "%${query}%")
                ->get();

            $results = $items->map(function ($item) use ($query, $controller) {

                return [
                    'title'     => $item->name,
                    'text'      => $item->desc,
                    'url'       => '/'.e(trans('impactfactory.blog::lang.search.locale')).'/'.e(trans('impactfactory.blog::lang.search.blogbase')).'/'.e(trans('impactfactory.blog::lang.search.categorybase')).'/'.$item->slug,
                ];
            });

            return [
                'provider' => e(trans('impactfactory.blog::lang.search.provider_categorypages')),
                'results'  => $results,
            ];
        });

      }
}
