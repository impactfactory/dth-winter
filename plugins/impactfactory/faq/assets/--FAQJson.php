<?php namespace ImpactFactory\Faq\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Faq\Models\Faq;
use System\Classes\MediaLibrary;

class FaqJson extends ComponentBase
{

    public $faq;

    public function componentDetails()
    {
        return [
            'name' => 'FAQs: FAQ-Schema hinzufügen',
            'description' => 'fügt RichSnippet-Angaben für Suchmaschinen hinzu'
        ];
    }

    //protected $slugs = ['slug' => ['first_name', 'last_name']];


    public function defineProperties()
    {}


    public function onRun()
    {
      $this->faq = Faq::all;
      $this->page['faq'] = $this->faq;
    }
}
