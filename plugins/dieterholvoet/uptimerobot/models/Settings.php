<?php

namespace DieterHolvoet\UptimeRobot\Models;

use Config;
use Model;

/**
 * @method static self instance
 */
class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'dieterholvoet_uptimerobot_settings';
    public $settingsFields = 'fields.yaml';

    public function __get($name)
    {
        if ($settingsValue = parent::__get($name))  {
            return $settingsValue;
        }

        if ($configValue = Config::get("dieterholvoet.uptimerobot::{$name}")) {
            return $configValue;
        }

        return null;
    }
}
