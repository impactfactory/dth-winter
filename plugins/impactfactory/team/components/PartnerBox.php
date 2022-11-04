<?php namespace ImpactFactory\Team\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Team\Models\Organisation;
use System\Classes\MediaLibrary;

class PartnerBox extends ComponentBase
{
    public $organisation;
    public $picposition;

    public function componentDetails()
    {
        return [
            'name' => 'Orga: Partnerbox anzeigen',
            'description' => 'Zeigt Bild, Name, Untertitel,Text und Link eines Partners bzw. einer Organisation'
        ];
    }

    public function defineProperties()
    {
        return [
            'organisation' => [
                'title' => 'Partner',
                'type' => 'dropdown'
            ],
            'picposition' => [
                'title' => 'Bildposition',
                'type' => 'dropdown',
            ]
        ];
    }

    public function getOrganisationOptions()
        {
            return Organisation::all()->pluck('name', 'id')->toArray();
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
      $this->picposition = $this->property('picposition');

      $this->organisation = Organisation::find($this->property('organisation'));
      $this->page['organisation'] = $this->organisation;
    }

}
