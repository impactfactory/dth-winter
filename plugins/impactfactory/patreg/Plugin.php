<?php namespace Impactfactory\Patreg;

use System\Classes\PluginBase;
use ImpactFactory\Patreg\Components\PatregAssurances;
use ImpactFactory\Patreg\Models\Assurance;


class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
          PatregAssurances::class => 'patregassurances',
      ];
    }

    public function registerSettings()
    {
    }
}
