<?php namespace ImpactFactory\Elements\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Elements extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'elements.elements'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Elements', 'main-menu-item', 'side-menu-elements');
    }
}
