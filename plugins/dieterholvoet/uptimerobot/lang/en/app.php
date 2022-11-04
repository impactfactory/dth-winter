<?php

return [
    'name' => 'Uptime Robot',
    'description' => 'Provides dashboard widgets with Uptime Robot statistics.',
    'settings' => 'Manage settings related to the Uptime Robot plugin.',
    'permission' => [
        'view_widgets' => 'View dashboard widgets',
        'access_settings' => 'Manage settings',
    ],
    'widget' => [
        'overall_uptime' => 'Overall uptime',
        'response_time' => 'Response time',
    ],
];
