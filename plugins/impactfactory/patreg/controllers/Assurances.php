<?php namespace Impactfactory\Patreg\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Assurances extends Controller
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
        'patreg.assurances' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Impactfactory.Patreg', 'main-menu-item', 'side-menu-assurances');
    }
}
