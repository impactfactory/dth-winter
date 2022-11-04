<?php namespace Impactfactory\Jobboard\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
//use Impactfactory\Jobboard\Models\ApplicantsExport;
//use Backend\Models\ExportModel;

class Jobboard extends Controller
{
    public $implement = [
      'Backend\Behaviors\ListController',
      'Backend\Behaviors\FormController',
      'Backend\Behaviors\ReorderController',
      'Backend.Behaviors.ImportExportController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Impactfactory.Jobboard', 'main-menu-item', 'side-menu-item');
    }
}
