<?php namespace ImpactFactory\Team\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class People extends Controller
{
    public $implement = [
      'Backend\Behaviors\ListController',
      'Backend\Behaviors\FormController',
      'Backend\Behaviors\ReorderController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'team.people'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Team', 'main-menu-item', 'side-menu-people');
    }
}
