<?php namespace Impactfactory\MedicalConditions\Controllers;

use Backend\Classes\Controller;
use Backend\Behaviors\RelationController;
use BackendMenu;

class MedicalConditions extends Controller
{
    public $implement = [
      'Backend\Behaviors\ListController',
      'Backend\Behaviors\FormController',
      'Backend\Behaviors\ReorderController',
       RelationController::class
     ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'medseo.*'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Impactfactory.MedicalConditions', 'main-menu-item', 'side-menu-item');
    }
}
