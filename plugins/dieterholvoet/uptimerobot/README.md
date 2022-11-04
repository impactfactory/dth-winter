oc-uptimerobot-plugin
======================

[![Latest Stable Version](https://poser.pugx.org/dieterholvoet/oc-uptimerobot-plugin/v/stable)](https://packagist.org/packages/dieterholvoet/oc-uptimerobot-plugin)
[![Total Downloads](https://poser.pugx.org/dieterholvoet/oc-uptimerobot-plugin/downloads)](https://packagist.org/packages/dieterholvoet/oc-uptimerobot-plugin)
[![License](https://poser.pugx.org/dieterholvoet/oc-uptimerobot-plugin/license)](https://packagist.org/packages/dieterholvoet/oc-uptimerobot-plugin)

> Provides dashboard widgets with Uptime Robot statistics

![Screenshot](https://i.imgur.com/7XTZ2cD.png)

## Installation

This OctoberCMS plugin requires PHP 7.0.8 or higher. It can be
installed using Composer:

```bash
 composer require dieterholvoet/oc-uptimerobot-plugin
```

## How does it work?
This plugin provides two dashboard widgets showing statistics collected 
 through the free [Uptime Robot](https://uptimerobot.com) service:
- **Overall uptime**: Shows a percentage indicating the overall uptime of
 your website.
- **Response time**: Shows a line graph with response times, collected 
 every 30 minutes

To prevent reaching API rate limits, the displayed data is refreshed every 
 5 minutes.
 
### Configuration
To configure the plugin, go to the settings page in the backend. This 
 plugin's settings can be found under the System section.
 
Configuration can also be provided through code by creating a configuration 
 file `config/dieterholvoet/uptimerobot/config.php`, or `config/dieterholvoet/uptimerobot/dev/config.php` for environment-specific configuration. Inside the overridden configuration file you can return only values you want to override.

```php
<?php

return [
    'api_key' => 'xxxxxxxxxx-xxxxxxxxxxxxxxxxxxxxxxxx',
    'monitor_id' => 000000000,
];
```                                                            

## Security
If you discover any security-related issues, please email
[dieter.holvoet@gmail.com](mailto:dieter.holvoet@gmail.com) instead of using the issue
tracker.

## License
Distributed under the MIT License. See the [LICENSE](LICENSE) file
for more information.
