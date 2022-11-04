<?php namespace ImpactFactory\Blog\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Blog\Models\Post;
use ImpactFactory\Blog\Models\Category;

class PostsInCategory extends ComponentBase
{
    public $posts;
    public $category;

    public function componentDetails()
    {
      return [
          'name'        => e(trans('impactfactory.blog::lang.components.categorypagename')),
          'description' => e(trans('impactfactory.blog::lang.components.categorypagedesc'))
      ];
    }


    public function onRun()
    {
      $this->category = Category::transWhere('slug', $this->param('slug'))->first();
      if ($this->category === null) {
          return $this->controller->run('404');
      }

      $this->page['category'] = $this->category;

      $this->posts = Post::published()->whereHas('categories', function($q) {
          $q->where('id', $this->category->id);
      })->get();

      $this->page['activeMenuItem'] = 'nav.main.knowledge';

      /*$this->posts = Post::whereHas('categories', function($q) {
          $q->where('id', 'slugid');
      })->get();*/

    }

    /*

    protected function prepareContextItem()
     {
         // load tag
         $this->tag = Tag::whereTranslatable('slug', $this->param('slug') )->first();

         return $this->tag;
     }


   protected function getPostsQuery()
   {
       $query = Post::whereHas('tags', function ($query) {
           $query->whereTranslatable('slug', $this->tag->slug);
       });

       if ($this->includeSeriesPosts) {
           $query->orWhereHas('series', function ($query) {
               $query->whereHas('tags', function ($query) {
                   $query->whereTranslatable('slug', $this->tag->slug);
               });
           });
       }

       $query->isPublished();

       return $query;
   }*/


}
