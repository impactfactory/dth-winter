<?php namespace ImpactFactory\Team\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Team\Models\Person;
use System\Classes\MediaLibrary;

class PortraitBox extends ComponentBase
{

    public $person;
    public $picposition;
    public $boxtitle;
    public $bg;
    public $boxsize;
    public $boxposition;

    public function componentDetails()
    {
        return [
            'name' => 'Orga: Portraitbox',
            'description' => 'Zeigt Bild, Text und Link zur einer oder mehreren Personen'
        ];
    }

    public function defineProperties()
    {
        return [
            'bg' => [
                'title' => 'Hintergrund-Farbe',
                'type' => 'dropdown',
            ],
            'boxposition' => [
                'title' => 'Position in Auflistung',
                'type' => 'dropdown',
            ],
            'boxsize' => [
                'title' => 'Breite der Portraitbox',
                'type' => 'dropdown',
            ],
            'boxtitle' => [
                'title' => 'Titel der Portraitbox',
                'type' => 'text',
            ],
            'person' => [
                'title' => 'Person',
                'type' => 'dropdown'
            ],
            'picposition' => [
                'title' => 'Bildposition',
                'type' => 'dropdown',
            ],
        ];
    }

    public function getNameAttribute()
        {
            return "$this->first_name $this->last_name";
        }

    public function getBoxpositionOptions()
            {
                return [
                  'begin' => 'am Anfang',
                  'inbetween' => 'dazwischen',
                  'end' => 'am Ende',
                ];
            }

    public function getBoxsizeOptions()
        {
            return [
              'fullwidth' => '100%',
              'halfwidth' => '50%',
              'thirdwidth' => '33%',
            ];
        }


    public function getPersonOptions()
        {
            return Person::all()->pluck('name', 'id')->toArray();
        }


    public function getPicpositionOptions()
    {
        return [
          'left' => 'links',
          'right' => 'rechts',
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

    public function onRender()
    {

      $this->bg = $this->property('bg');
      $this->boxtitle = $this->property('boxtitle');
      $this->boxposition = $this->property('boxposition');
      $this->boxsize = $this->property('boxsize');
      $this->picposition = $this->property('picposition');

      $this->person = Person::find($this->property('person'));
      $this->page['person'] = $this->person;

      /*
      $this->person = Person::find($this->property('person'));
       if($this->person) {
           $this->persons = collect($this->person->persons)->toArray();
       }
       */
    }

}
