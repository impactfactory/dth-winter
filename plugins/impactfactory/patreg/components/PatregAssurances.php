<?php namespace ImpactFactory\Patreg\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Patreg\Models\Assurance;

class PatregAssurances extends ComponentBase
{
    public $assurances;

    public function componentDetails()
    {
        return [
            'name'        => 'Assurances: Alle Versicherungen anzeigen',
            'description' => ''
        ];
    }





    public function init()
    {
        $this->assurances = Assurance::all();
    }

    public function onRun()
    {
      $this->assurances = Assurance::all();
    }

}
