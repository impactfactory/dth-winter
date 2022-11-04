<?php namespace ImpactFactory\Elements\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Elements\Models\Element as ElementModel;

class Textvideos extends Element
{
    public $size3;
    public $bg;

    public function componentDetails()
    {
        return [
            'name'        => 'Elements: Horizontale Video-Text-Box(en)',
            'description' => 'zeigt ein Video mit Text daneben an'
        ];
    }


public function defineProperties()
{
    return [
        'element' => [
            'title' => 'Element',
            'type' => 'dropdown',
        ],
        'size3' => [
            'title' => 'Breite',
            'type' => 'dropdown',
        ],
        'bg' => [
            'title' => 'Hintergrund-Farbe',
            'type' => 'dropdown',
        ]
    ];
}

public function getSize3Options()
{
    return [
      'row-cols-1' => '100%',
      'row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2' => '50%',
      'row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3' => '33%',
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

public function getElementOptions()
{
    return ElementModel::pluck('name', 'id')->toArray();
}

public function onRun()
{
    $this->size3 = $this->property('size3');
    $this->bg = $this->property('bg');
    
    $this->element = ElementModel::find($this->property('element'));
     if($this->element) {
         $this->elements = collect($this->element->elements)->toArray();
     }

}
}
