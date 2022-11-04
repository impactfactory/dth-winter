<?php

namespace DieterHolvoet\UptimeRobot\Classes;

use Cache;
use DieterHolvoet\UptimeRobot\Models\Settings;
use GuzzleHttp\Client;
use October\Rain\Support\Traits\Singleton;
use Psr\Http\Message\ResponseInterface;

class UptimeRobot
{
    use Singleton;

    /** @var string */
    protected $monitor;
    /** @var int */
    protected $cacheTime;
    /** @var Client */
    protected $client;

    protected function init()
    {
        $settings = Settings::instance();

        $this->monitor = $settings->monitor_id;
        $this->cacheTime = 5;
        $this->client = new Client([
            'base_uri' => 'https://api.uptimerobot.com/',
            'form_params' => [
                'api_key' => $settings->api_key,
                'format' => 'json',
                'monitors' => $this->monitor,
            ],
        ]);
    }

    public function getOverallUptime(int $numberOfDays)
    {
        return Cache::remember(
            "dieterholvoet.uptimerobot.{$this->monitor}.overall_uptime",
            $this->cacheTime,
            function() use ($numberOfDays) {
                $data = $this->getMonitors([
                    'custom_uptime_ratios' => $numberOfDays,
                ]);

                return (float) $data['monitors'][0]['custom_uptime_ratio'];
            }
        );
    }

    public function getResponseTimes()
    {
        return Cache::remember(
            "dieterholvoet.uptimerobot.{$this->monitor}.response_times",
            $this->cacheTime,
            function() {
                $data = $this->getMonitors([
                    'response_times' => 1,
                    'response_times_average' => 30,
                ]);

                return $data['monitors'][0]['response_times'];
            }
        );
    }

    protected function getMonitors(array $params)
    {
        $params = array_merge(
            $this->client->getConfig('form_params'),
            $params
        );

        $response = $this->client->post('v2/getMonitors', ['form_params' => $params]);
        $data = json_decode($response->getBody(), true);

        if ($this->isResponseError($response)) {
            $this->handleResponseError($response);
        }

        return $data;
    }

    protected function isResponseError(ResponseInterface $response)
    {
        $data = json_decode($response->getBody(), true);

        return !$response->getStatusCode() === '200'
            || $data['stat'] === 'fail';
    }

    protected function handleResponseError(ResponseInterface $response)
    {
        $data = json_decode($response->getBody(), true);
        $message = 'Error fetching monitors from the UptimeRobot API';

        if (isset($data['error'])) {
            $message = sprintf('%s: %s, %s', $message, $data['error']['type'], $data['error']['message']);
        }

        throw new \Exception($message);
    }
}
