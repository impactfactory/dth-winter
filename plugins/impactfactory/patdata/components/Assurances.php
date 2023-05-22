<?php namespace ImpactFactory\Patdata\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Patdata\Models\Assurance;

class Assurances extends ComponentBase
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
