<?php namespace ImpactFactory\Blog\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Blog\Models\Post;
use ImpactFactory\Blog\Models\Tag;
use ImpactFactory\Blog\Component\PostsAll;

class PostsWithTag extends ComponentBase
{
    public $posts;
    public $tag;
    public $test;

    public function componentDetails()
    {
        return [
            'name'        => e(trans('impactfactory.blog::lang.components.tagpagename')),
            'description' => e(trans('impactfactory.blog::lang.components.tagpagedesc')),
        ];
    }

    public function onRun()
    {
      $this->tag = Tag::transWhere('slug', $this->param('slug'))->first();
      if ($this->tag === null) {
          return $this->controller->run('404');
      }

      $this->page['tag'] = $this->tag;

      //$this->page['test'] = $this->tag->id;

      $this->posts = Post::published()->whereHas('tags', function($q) {
          $q->where('id', $this->tag->id);
      })->get();

      $this->page['activeMenuItem'] = 'nav.main.knowledge';

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
