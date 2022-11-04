<?php

namespace DieterHolvoet\UptimeRobot;

use DieterHolvoet\UptimeRobot\Models\Settings;
use DieterHolvoet\UptimeRobot\ReportWidgets\ResponseTime;
use DieterHolvoet\UptimeRobot\ReportWidgets\Uptime;
use Lang;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => Lang::get('dieterholvoet.uptimerobot::app.name'),
            'description' => Lang::get('dieterholvoet.uptimerobot::app.description'),
            'author'      => 'DieterHolvoet',
            'icon'        => 'icon-refresh'
        ];
    }

    public function registerPermissions()
    {
        return [
            'dieterholvoet.uptimerobot.access_settings' => [
                'label' => Lang::get('dieterholvoet.uptimerobot::app.permission.access_settings'),
                'tab' => Lang::get('dieterholvoet.uptimerobot::app.name'),
                'order' => 100,
            ],
            'dieterholvoet.uptimerobot.view_widgets' => [
                'label' => Lang::get('dieterholvoet.uptimerobot::app.permission.view_widgets'),
                'tab' => Lang::get('dieterholvoet.uptimerobot::app.name'),
                'order' => 200,
            ],
        ];
    }

    public function registerReportWidgets()
    {
        return [
            Uptime::class =>[
                'label'   => 'Uptime Robot overall uptime',
                'context' => 'dashboard',
                'permissions' => ['dieterholvoet.uptimerobot.view_widgets'],
            ],
            ResponseTime::class =>[
                'label'   => 'Uptime Robot response time',
                'context' => 'dashboard',
                'permissions' => ['dieterholvoet.uptimerobot.view_widgets'],
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => Lang::get('dieterholvoet.uptimerobot::app.name'),
                'description' => Lang::get('dieterholvoet.uptimerobot::app.settings'),
                'category'    => SettingsManager::CATEGORY_SYSTEM,
                'icon'        => 'icon-refresh',
                'class'       => Settings::class,
                'order'       => 500,
                'keywords'    => 'settings uptime robot analytics',
                'permissions' => ['dieterholvoet.uptimerobot.access_settings'],
            ],
        ];
    }
}
