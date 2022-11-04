<?php namespace ImpactFactory\Ref\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Ref\Models\Assurance;

class RefAssurances extends ComponentBase
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
