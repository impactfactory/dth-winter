<?php namespace ImpactFactory\Team\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Team\Models\Organisation;
use System\Classes\MediaLibrary;

class OrgaJson extends ComponentBase
{

    public $organisation;

    public function componentDetails()
    {
        return [
            'name' => 'Orga: Organisations-Schema hinzufügen',
            'description' => 'fügt RichSnippet-Angaben für Suchmaschinen hinzu'
        ];
    }

    //protected $slugs = ['slug' => ['first_name', 'last_name']];


    public function defineProperties()
    {
        return [
            'organisation' => [
                'title' => 'Partner',
                'type' => 'dropdown'
            ]
        ];
    }

    public function getOrganisationOptions()
        {
            return Organisation::all()->pluck('name', 'id')->toArray();
        }

    public function onRun()
    {
      $this->organisation = Organisation::find($this->property('organisation'));
      $this->page['organisation'] = $this->organisation;
    }
}
