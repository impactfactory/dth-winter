<?php namespace ImpactFactory\Elements\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Elements\Models\Element as ElementModel;

class AccordionPlus extends Element
{

    public $boxtitle;

    public function componentDetails()
    {
        return [
            'name'        => 'Elements: AccordionPlus',
            'description' => 'zeigt ein Accordion mit Text daneben an'
        ];
    }


public function defineProperties()
{
    return [
        'element' => [
            'title' => 'Element',
            'type' => 'dropdown',
        ],
      'boxtitle' => [
          'title' => 'Titel der AccordionplusBox',
          'type' => 'text',
      ]
    ];
}

public function getElementOptions()
{
    return ElementModel::pluck('name', 'id')->toArray();
}

public function onRun()
{
    $this->boxtitle = $this->property('boxtitle');
    $this->element = ElementModel::find($this->property('element'));
     if($this->element) {
         $this->elements = collect($this->element->elements)->toArray();
     }

}

}
