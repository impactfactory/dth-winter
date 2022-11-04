<?php namespace Liip\Util;

use Liip\Util\Classes\TwigFilters;
use Liip\Util\Components\Git;
use Liip\Util\Components\LocalePicker;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            Git::class => 'git',
            LocalePicker::class => 'liipLocalePicker'
        ];
    }

    public function registerSettings()
    {
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'nl2p' => [TwigFilters::class, 'nl2p'],
                'rating' => [TwigFilters::class, 'rating'],
                'is_file' => [TwigFilters::class, 'is_file'],
                'query' => [TwigFilters::class, 'query'],
            ]
        ];
    }

    public function registerListColumnTypes()
    {
        return [
            'published' => function($value) {
                $icon = $value ? 'icon-circle' : 'icon-circle-o';
                $color = $value ? 'green' : 'lightgrey';
                return "<span><i class='$icon' style='color: $color'></i></span>";
            }
        ];
    }
}
