<?php namespace ImpactFactory\Blog\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Blog\Models\Post;

class PostsAll extends ComponentBase
{
    public $posts;

    public function componentDetails()
    {
        return [
            'name'        => e(trans('impactfactory.blog::lang.components.postsallname')),
            'description' => e(trans('impactfactory.blog::lang.components.postsalldesc'))
        ];
    }


    public function init()
    {
        $this->posts = Post::published()->get();
    }

    public function onRun()
    {
      //$this->bg = $this->property('bg');
    }

}
