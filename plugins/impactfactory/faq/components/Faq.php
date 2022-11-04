<?php namespace ImpactFactory\Faq\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Faq\Models\Category;
use ImpactFactory\Faq\Models\Faq as FaqModel;

class Faq extends ComponentBase
{
    public $bg;
    public $categories;
    public $faqs;

    public function componentDetails()
    {
        return [
            'name'        => 'FAQs: Alle Fragen anzeigen',
            'description' => 'blendet alle Fragen in Kategorien geordnet ein'
        ];
    }

    public function defineProperties()
    {
        return [
            'bg' => [
                'title' => 'Hintergrund-Farbe',
                'type' => 'dropdown',
            ]
        ];
    }

    public function getBgOptions()
    {
        return [
          '1' => 'Weiss',
          '2' => 'Grau',
          '3' => 'aufgehelltes Türkis',
          '4' => 'Türkis',
          '5' => 'abgedunkeltes Türkis',
          '6' => 'aufgehelltes Rot'
        ];
    }

    public function init()
    {
        $this->categories = Category::all();
        $this->faqs = FaqModel::all();
    }

    public function onRun()
    {
      $this->bg = $this->property('bg');
    }

}
