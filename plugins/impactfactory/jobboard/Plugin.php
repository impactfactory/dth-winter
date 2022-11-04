<?php namespace Impactfactory\Jobboard;

use System\Classes\PluginBase;
use Impactfactory\Jobboard\Models\ApplicantsExport;
use Impactfactory\Jobboard\Components\ApplicationForm;

class Plugin extends PluginBase
{
  public function registerComponents()
  {
    return [
      ApplicationForm::class => 'applicationform'
    ];
  }

  public function registerPageSnippets()
  {
      return [
         ApplicationForm::class => 'applicationform'
      ];
  }
}
