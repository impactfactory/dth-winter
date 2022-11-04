<?php

namespace DieterHolvoet\UptimeRobot\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use DieterHolvoet\UptimeRobot\Classes\UptimeRobot;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Exception;

class ResponseTime extends ReportWidgetBase
{
    /** @var UptimeRobot */
    protected $client;

    public function init()
    {
        $this->client = UptimeRobot::instance();
    }

    public function render()
    {
        try {
            $this->loadData();
        } catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => e(trans('dieterholvoet.uptimerobot::app.widget.response_time')),
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error'
            ],
        ];
    }

    protected function loadData()
    {
        $this->vars['responseTimeData'] = implode(
            ', ',
            array_map(
                static function (array $responseTime) {
                    $responseTime['datetime'] = ((int) $responseTime['datetime']) * 1000;
                    return "[{$responseTime['datetime']}, {$responseTime['value']}]";
                },
                $this->client->getResponseTimes()
            )
        );
    }
}
