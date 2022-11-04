<?php namespace ImpactFactory\Team\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Team\Models\Person;
use System\Classes\MediaLibrary;

class TeamPerson extends ComponentBase
{
    public $person;

    public function componentDetails()
    {
        return [
            'name' => 'Orga: Portrait anzeigen',
            'description' => ''
        ];
    }

    public function defineProperties()
    {
        return [
            'person' => [
                'lastname' => 'Name',
                'type' => 'dropdown'
            ]
        ];
    }

    public function getPersonOptions()
    {
        return Person::all()->pluck('lastname', 'id')->toArray();
    }

    public function onRun()
    {
      $this->person = Person::where('slug', $this->param('slug'))->first();
      if ($this->person === null) {
          return $this->controller->run('404');
      }

      $this->page['person'] = $this->person;
      

      $this->page['activeMenuItem'] = 'nav.main.team';

    }
}
