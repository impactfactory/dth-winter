<?php namespace Impactfactory\MedicalConditions;

use System\Classes\PluginBase;
use ImpactFactory\MedicalConditions\Components\ConditionSchema;

class Plugin extends PluginBase
{
  public function registerComponents()
  {
      return [
          ConditionSchema::class => 'conditionschema',
      ];
  }

  public function registerPageSnippets()
  {
      return [
        ConditionSchema::class => 'conditionschema',
      ];
  }

  public function registerSettings()
  {
  }
  
}
