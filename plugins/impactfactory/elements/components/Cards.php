<?php namespace ImpactFactory\Elements\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Elements\Models\Element as ElementModel;

class Cards extends Element
{
    public $size;

    public function componentDetails()
    {
        return [
            'name'        => 'Elements: Vertikale Bild-Text-Box(en)',
            'description' => 'zeigt eine oder mehrere vertikale Text-Bild-Boxen an'
        ];
    }




public function defineProperties()
{
    return [
        'element' => [
            'title' => 'Element',
            'type' => 'dropdown',
        ],
        'size' => [
            'title' => 'Breite',
            'type' => 'dropdown',
        ]
    ];
}

public function getSizeOptions()
{
    return [
      'row-cols-1' => '100%',
      'row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2' => '50%',
      'row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3' => '33%',
    ];
}

public function getElementOptions()
{
    return ElementModel::pluck('name', 'id')->toArray();
}

public function onRun()
{
    $this->size = $this->property('size');
    $this->element = ElementModel::find($this->property('element'));
    if($this->element) {
        $this->elements = collect($this->element->elements)->toArray();
    }

}
}
