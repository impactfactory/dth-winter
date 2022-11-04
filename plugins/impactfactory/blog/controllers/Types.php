<?php namespace ImpactFactory\Blog\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Types extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'blog.types' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Blog', 'main-menu-item', 'side-menu-item4');
    }
}
