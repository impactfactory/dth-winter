<?php

namespace Renatio\SeoManager\Classes;

use Backend\Classes\Controller;

/**
 * Class Assets
 * @package Renatio\SeoManager\Classes
 */
class Assets
{

    /**
     * @param  Controller  $controller
     */
    public static function add($controller)
    {
        $controller->addCss('/plugins/renatio/seomanager/assets/css/style.css');
        $controller->addJs('/plugins/renatio/seomanager/assets/js/main.js');
    }
}
