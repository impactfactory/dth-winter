<?php namespace ImpactFactory\Team\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\Team\Models\Organisation;
use System\Classes\MediaLibrary;

class OrgaMeta extends ComponentBase
{

    public $meta;

    public function componentDetails()
    {
        return [
            'name' => 'Orga: Meta-Tags mit Angaben aus Orga-Plugin füllen',
            'description' => 'ersetzt default author, copyright, site name und description'
        ];
    }

    public function onRun()
    {
      $this->meta = Organisation::where('type', 'main')->first();
      $this->page['meta'] = $this->meta;
    }
}
