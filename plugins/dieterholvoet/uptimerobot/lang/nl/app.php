<?php

return [
    'name' => 'Uptime Robot',
    'description' => 'Voorziet dashboard widgets met Uptime Robot-statistieken.',
    'settings' => 'Beheer instellingen gerelateerd aan de Uptime Robot-plugin.',
    'permission' => [
        'view_widgets' => 'Bekijk dashboard widgets',
        'access_settings' => 'Beheer instellingen',
    ],
    'widget' => [
        'overall_uptime' => 'Algemene uptime',
        'response_time' => 'Reactietijd',
    ],
];
