<?php namespace ImpactFactory\Elements\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Elements\Models\Element as ElementModel;

class Keyvisuals extends Element
{

    public $color2;
    public $semantics2;

    public function componentDetails()
    {
        return [
            'name'        => 'Elements: Keyvisual(s)',
            'description' => 'zeigt eine oder mehrere Textlinien über Bildhintergrund an'
        ];
    }


    public function defineProperties()
    {
        return [
            'element' => [
                'title' => 'Element',
                'type' => 'dropdown',
            ],
            'color2' => [
                'title' => 'Text-Farbe',
                'type' => 'dropdown',
            ],
            'semantics2' => [
                'title' => 'semantische Titelgrösse',
                'type' => 'dropdown',
            ]
        ];
    }


    public function getColor2Options()
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

    public function getSemantics2Options()
    {
        return [
          '1' => 'h1',
          '2' => 'h2',
          '3' => 'h3',
          '4' => 'h4',
          '5' => 'h5',
          '6' => 'h6'
        ];
    }

    public function getElementOptions()
    {
        return ElementModel::pluck('name', 'id')->toArray();
    }

    public function onRun()
    {
        $this->color2 = $this->property('color2');
        $this->semantics2 = $this->property('semantics2');
        $this->element = ElementModel::find($this->property('element'));
         if($this->element) {
             $this->elements = collect($this->element->elements)->toArray();
         }

    }
}
