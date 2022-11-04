<?php namespace ImpactFactory\Team\Controllers;

use Backend\Behaviors\FormController;
use Backend\Behaviors\ListController;
use Backend\Classes\Controller;
use BackendMenu;

class Organisations extends Controller
{
    public $implement = [
        ListController::class,
        FormController::class,
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'team.organisations'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Team', 'main-menu-item', 'side-menu-organisations');
    }
}
