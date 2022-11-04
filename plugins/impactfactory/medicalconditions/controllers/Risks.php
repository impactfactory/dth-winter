<?php namespace Impactfactory\MedicalConditions\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Risks extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'medseo.risks'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Impactfactory.MedicalConditions', 'main-menu-item', 'side-menu-item2');
    }
}
