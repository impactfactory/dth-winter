<?php namespace ImpactFactory\Elements\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Elements\Models\Element as ElementModel;

class Element extends ComponentBase
{
    public $element;
    public $elements;
    public $size;

    public function componentDetails()
    {
        return [
            'name'        => 'Element',
            'description' => 'Inhalts-Elemente'
        ];
    }

    public function defineProperties()
    {
        return [
            'element' => [
                'label' => 'Typ wählen',
                'type' => 'dropdown',
            ],
            'size' => [
                'label' => 'Breite',
                'type' => 'dropdown',
            ]
        ];
    }

    public function getSizeOptions()
    {
        return [
          'col-12' => '100',
          'col-sm-12 col-md-6 col-lg-6' => '50',
          'col-sm-12 col-md-6 col-lg-4' => '33',
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
            $this->elements = collect($this->element->elements)->where('is_published', true)->toArray();
        }
    }
}
