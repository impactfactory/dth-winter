<?php namespace ImpactFactory\Ref\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Ref\Models\Patient;

class RefPatients extends ComponentBase
{
    public $patient;

    public function componentDetails()
    {
        return [
            'name'        => 'Patients: Patientendaten anzeigen',
            'description' => ''
        ];
    }





    public function onRun()
    {
      $id = $this->param('id');
      $patient = Patient::Where('id', $id)->first();
      $this->patient = $patient;
    }

}
