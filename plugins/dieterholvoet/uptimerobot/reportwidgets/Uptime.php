<?php

namespace DieterHolvoet\UptimeRobot\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use DieterHolvoet\UptimeRobot\Classes\UptimeRobot;

class Uptime extends ReportWidgetBase
{
    /** @var UptimeRobot */
    protected $client;

    public function init()
    {
        $this->client = UptimeRobot::instance();
    }

    public function render()
    {
        $numberOfDays = 1;

        try {
            $this->loadData($numberOfDays);
        } catch (\Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => e(trans('dieterholvoet.uptimerobot::app.widget.overall_uptime')),
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error'
            ],
        ];
    }

    protected function loadData(int $numberOfDays)
    {
        $this->vars['numberOfDays'] = $numberOfDays;
        $this->vars['uptime'] = $this->client->getOverallUptime($numberOfDays);
    }
}
