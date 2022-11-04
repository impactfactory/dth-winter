<?php namespace Impactfactory\Galleries;

use System\Classes\PluginBase;
use ImpactFactory\Galleries\Components\GalleryDisplay;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
      return [
          GalleryDisplay::class => 'gallerydisplay'
      ];
    }

    public function registerPageSnippets()
    {
      return [
          GalleryDisplay::class => 'gallerydisplay'
      ];
    }

    public function registerSettings(){}
      
}
