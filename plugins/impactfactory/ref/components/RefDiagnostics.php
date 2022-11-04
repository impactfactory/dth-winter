<?php namespace ImpactFactory\Ref\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Ref\Models\Diagnostic;

class RefDiagnostics extends ComponentBase
{
    public $diagnostics;

    public function componentDetails()
    {
        return [
            'name'        => 'Diagnostics: Alle Untersuchungen anzeigen',
            'description' => ''
        ];
    }





    public function init()
    {
        $this->diagnostics = Diagnostic::all();
    }

    public function onRun()
    {
      $this->diagnostics = Diagnostic::all();
    }

}
