<?php namespace ImpactFactory\Ref;

use System\Classes\PluginBase;
use ImpactFactory\Ref\Components\RefAssurances;
use ImpactFactory\Ref\Components\RefDiagnostics;
use ImpactFactory\Ref\Components\RefPatients;
use ImpactFactory\Ref\Models\Diagnostic;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
          RefAssurances::class => 'refassurances',
          RefDiagnostics::class => 'refdiagnostics',
          RefPatients::class => 'refpatients'
      ];
    }

    public function registerSettings()
    {
    }
}
