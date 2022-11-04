<?php namespace Impactfactory\MedicalConditions\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Treatments extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'medseo.treatments'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Impactfactory.MedicalConditions', 'main-menu-item', 'side-menu-item9');
    }
}
