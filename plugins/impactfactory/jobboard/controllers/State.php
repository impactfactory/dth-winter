<?php namespace Impactfactory\Jobboard\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class State extends Controller
{
    public $implement = [
      'Backend\Behaviors\ListController',
      'Backend\Behaviors\FormController',
      'Backend\Behaviors\ReorderController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'jobboard'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Impactfactory.Jobboard', 'main-menu-item', 'side-menu-item2');
    }
}
