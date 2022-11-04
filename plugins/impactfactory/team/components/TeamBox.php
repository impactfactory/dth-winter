<?php namespace ImpactFactory\Team\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Team\Models\Person as PersonModel;
use System\Classes\MediaLibrary;

class TeamBox extends ComponentBase
{
    public $person;
    public $size4;
    public $picposition;

    public function componentDetails()
    {
        return [
            'name' => 'Orga: Portrait anzeigen',
            'description' => 'Zeigt Bild, Text und Link zur gewählten Person'
        ];
    }

    public function defineProperties()
    {
        return [
            'person' => [
                'title' => 'Person',
                'type' => 'dropdown'
            ],
            'size4' => [
                'title' => 'Breite',
                'type' => 'dropdown',
            ],
            'picposition' => [
                'title' => 'Bildposition',
                'type' => 'dropdown',
            ]
        ];
    }

public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

public function getPersonOptions()
    {
        return PersonModel::all()->pluck('name', 'id')->toArray();
    }


    public function getSize4Options()
    {
        return [
          'row-cols-1' => '100%',
          'row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2' => '50%',
          'row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3' => '33%',
        ];
    }

    public function getPicpositionOptions()
    {
        return [
          'left' => 'links',
          'right' => 'rechts',
        ];
    }

    public function onRun()
    {
      $this->size4 = $this->property('size4');
      $this->picposition = $this->property('picposition');
      $this->person = PersonModel::find($this->property('person'));
       if($this->person) {
           $this->persons = collect($this->person->persons)->toArray();
       }
    }

}
