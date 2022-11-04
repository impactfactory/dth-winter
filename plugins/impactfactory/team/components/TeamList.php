<?php namespace ImpactFactory\Team\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Team\Models\Person;
use ImpactFactory\Team\Models\Team;
use ImpactFactory\Team\Models\Organisation;

class TeamList extends ComponentBase
{
    //public $person;
    public $teams;
    public $organisation;

    public function componentDetails()
    {
        return [
            'name' => 'Orga: Team-Liste einfügen',
            'description' => 'Personen von einem oder mehrere Teams anzeigen'
        ];
    }

    public function defineProperties()
    {
        return [
            'organisation' => [
                'title' => 'Organisation',
                'type' => 'dropdown'
            ]
        ];
    }

    public function getOrganisationOptions()
    {
        return Organisation::all()->pluck('name', 'id')->toArray();
    }

    public function init()
    {
        $this->addJs('assets/js/teamlist.js');
    }

    public function onRun()
    {
        $this->organisation = Organisation::with(['teams' => function ($teams) {
                $teams->orderBy('sort_order');
                $teams->with(['people' => function ($people) {
                    $people->published()->orderBy('sort_order');
                }]);
            }])
            ->find($this->property('organisation'))
        ;
        $this->teams = $this->organisation ? $this->organisation->teams : [];
    }
}
