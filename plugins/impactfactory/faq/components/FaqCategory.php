<?php namespace ImpactFactory\Faq\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Faq\Models\Category;
use ImpactFactory\Faq\Models\Faq;

class FaqCategory extends ComponentBase
{
    /**
     * @var \Liip\Faq\Models\Faq
     */
    public $bg;
    public $faqs;
    public $title;

    public function componentDetails()
    {
        return [
            'name'        => 'FAQs: Fragen per Kategorie einblenden',
            'description' => 'Blendet FAQs gefiltert nach einer Kategorie ein'
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title' => 'Category',
                'type' => 'dropdown'
            ],
            'bg' => [
                'title' => 'Hintergrund-Farbe',
                'type' => 'dropdown',
            ],
            'title' => [
                'title' => 'Abschnittstitel',
                'type' => 'text',
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

    public function getCategoryOptions()
    {
        return Category::all()->pluck('name', 'id')->toArray();
    }

    public function onRun()
    {
        $this->faqs = Faq::whereHas('categories', function($q) {
            $q->where('id', $this->property('category'));
        })->get();

        $this->bg = $this->property('bg');
        $this->title = $this->property('title');
    }
}
