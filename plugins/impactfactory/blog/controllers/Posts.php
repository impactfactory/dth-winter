<?php namespace ImpactFactory\Blog\Controllers;

use Backend\Classes\Controller;
use BackendMenu;


class Posts extends Controller
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
        'blog.posts'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Blog', 'main-menu-item', 'side-menu-item');
    }
}
