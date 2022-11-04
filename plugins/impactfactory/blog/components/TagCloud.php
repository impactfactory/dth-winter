<?php namespace ImpactFactory\Blog\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Blog\Models\Tag;
use ImpactFactory\Blog\Models\Post;

class TagCloud extends ComponentBase
{
    public $tags;

    public function componentDetails()
    {
        return [
            'name'        => e(trans('impactfactory.blog::lang.components.tagcloudname')),
            'description' => e(trans('impactfactory.blog::lang.components.tagclouddesc')),
        ];
    }

    public function onRun()
    {

      $this->tags = Tag::published()->withCount('posts')->orderBy('name', 'ASC')->get();

      // sort by alphabet
      //$tagId = Tag::->id->get();

      //->count();

      /*

      number = number of rows in pivot with that tag //


      $this->tag = Tag::transWhere('slug', $this->param('slug'))->first();
      if ($this->tag === null) {
          return $this->controller->run('404');
      }
      $this->page['tag'] = $this->tag;
      */




      /*

      $this->page['test'] = $this->tag->id;

      $this->tags = Tag::whereHas('tags', function($q) {
          $q->where('id', $this->tag->id);
      })->get();
      */

      /*$this->tag_id = Tag::where('slug', $this->param('slug'))->pluck('name', 'id')->toArray();
      $this->tag_id = $tag_id

      $this->page['tag'] = $this->tag;
      //$this->tag = $tag;

      $this->posts = Post::whereHas('tags', function($q) {
          $q->where('id', $tag_id);
      })->get();

      $this->posts = $posts;*/
    }

}
