<?php namespace ImpactFactory\Team\Controllers;

use Backend\Behaviors\RelationController;
use Backend\Behaviors\ReorderController;
use Backend\Classes\Controller;
use BackendMenu;

class Teams extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        ReorderController::class,
        RelationController::class,
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'team.teams'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Team', 'main-menu-item', 'side-menu-teams');
    }
}
