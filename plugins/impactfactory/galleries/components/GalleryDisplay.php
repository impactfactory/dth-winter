<?php namespace ImpactFactory\Galleries\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Galleries\Models\Gallery;
//use System\Classes\MediaLibrary;

class GalleryDisplay extends ComponentBase
{

    public $gallery;

    public function componentDetails()
    {
      return [
          'name'        => e(trans('impactfactory.galleries::lang.components.gallerydisplayname')),
          'description' => e(trans('impactfactory.galleries::lang.components.gallerydisplaydesc'))
      ];
    }

    public function defineProperties()
    {
        return [
            'gallery' => [
                'title' => e(trans('impactfactory.galleries::lang.components.gallery')),
                'type' => 'dropdown',
            ]
        ];
    }

    public function getGalleryOptions()
    {
        return Gallery::pluck('name', 'id')->toArray();
    }

    public function onRender()
    {

        $this->gallery = Gallery::find($this->property('gallery'));

    }

}
