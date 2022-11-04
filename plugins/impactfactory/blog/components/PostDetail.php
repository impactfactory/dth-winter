<?php namespace ImpactFactory\Blog\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Blog\Models\Post;
//use System\Classes\MediaLibrary;

class PostDetail extends ComponentBase
{

    public $post;

    public function componentDetails()
    {
      return [
          'name'        => e(trans('impactfactory.blog::lang.components.postdetailname')),
          'description' => e(trans('impactfactory.blog::lang.components.postdetaildesc'))
      ];
    }

    public function onRun()
    {
      $slug = $this->param('slug');
      $post = Post::Where('slug', $slug)->first();

        if ($post == null) {
            $post = Post::transWhere('slug', $slug)->first();
        }

        if (null === $post) {
            return $this->controller->run('404');
        }

      $this->post = $post;

      $this->page['activeMenuItem'] = 'nav.main.knowledge';

    }

}
