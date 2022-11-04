<?php

namespace Renatio\SeoManager\Models;

use Facades\Renatio\SeoManager\Classes\Htaccess;
use Facades\Renatio\SeoManager\Classes\Robots;
use Model;
use System\Behaviors\SettingsModel;

/**
 * Class Settings
 * @package Renatio\SeoManager\Models
 */
class Settings extends Model
{

    /**
     * @var array
     */
    public $implement = [SettingsModel::class];

    /**
     * @var string
     */
    public $settingsCode = 'renatio_seomanager_settings';

    /**
     * @var string
     */
    public $settingsFields = 'fields.yaml';

    /**
     * @return void
     */
    public function initSettingsData()
    {
        $this->og_enabled = true;
    }

    /**
     * @return string
     */
    public function getRobotsAttribute()
    {
        return Robots::get();
    }

    /**
     * @param $content
     */
    public function setRobotsAttribute($content)
    {
        Robots::set($content);
    }

    /**
     * @return string
     */
    public function getHtaccessAttribute()
    {
        return Htaccess::get();
    }

    /**
     * @param $content
     */
    public function setHtaccessAttribute($content)
    {
        Htaccess::set($content);
    }
}
