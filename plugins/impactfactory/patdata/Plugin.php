<?php namespace ImpactFactory\Patdata;

use System\Classes\PluginBase;
use ImpactFactory\Patdata\Components\Assurances;


class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
          Assurances::class => 'Assurances'
      ];
    }

    public function registerSettings()
    {
    }
}
