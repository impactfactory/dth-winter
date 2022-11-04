<?php namespace ImpactFactory\Elements\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Elements\Models\Element as ElementModel;

class ListBlocks extends Element
{

    public $boxtitle;
    public $bg;

    public function componentDetails()
    {
        return [
            'name'        => 'Elements: Blockliste',
            'description' => 'zeigt eine Liste mit Blöcken an, welche bei Mouse-Hover sanft einen Text einblenden'
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
              'title' => 'Titel des Abschnitts',
              'type' => 'text',
          ],
          'bg' => [
              'title' => 'Hintergrund-Farbe',
              'type' => 'dropdown',
          ]
        ];
    }

    public function getElementOptions()
    {
        return ElementModel::pluck('name', 'id')->toArray();
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

    public function onRun()
     {

        $this->element = ElementModel::find($this->property('element'));
         if($this->element) {
             $this->elements = collect($this->element->elements)->toArray();
         }

         $this->boxtitle = $this->property('boxtitle');

         $this->bg = $this->property('bg');

    }

}
