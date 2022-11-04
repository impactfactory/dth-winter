<?php namespace ImpactFactory\Ref\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class States extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'ref.state' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Ref', 'main-menu-item', 'side-menu-states');
    }
}
