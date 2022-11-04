<?php namespace ImpactFactory\Elements;

use ImpactFactory\Elements\Components\Cards;
use ImpactFactory\Elements\Components\Keyvisuals;
use ImpactFactory\Elements\Components\ListBlocks;
use ImpactFactory\Elements\Components\Tabs;
use ImpactFactory\Elements\Components\Textpics;
use ImpactFactory\Elements\Components\Textvideos;
use ImpactFactory\Elements\Components\Toasts;
use System\Classes\PluginBase;


class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            Cards::class => 'cards',
            Keyvisuals::class => 'keyvisuals',
            ListBlocks::class => 'listblocks',
            Tabs::class => 'tabs',
            TextPics::class => 'textpics',
            TextVideos::class => 'textvideos',
            Toasts::class => 'toasts'
        ];
    }

    public function registerPageSnippets()
    {
        return $this->registerComponents();
    }

}
