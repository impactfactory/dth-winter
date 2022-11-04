<?php namespace ImpactFactory\Faq\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Faqs extends Controller
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
        'faq.faqs'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Faq', 'main-menu-item', 'side-menu-faqs');
    }
}
