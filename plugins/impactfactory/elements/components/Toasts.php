<?php namespace ImpactFactory\Elements\Components;

use Cms\Classes\ComponentBase;
use \ImpactFactory\Elements\Models\Element as ElementModel;

class Toasts extends Element
{

    public $animation;
    public $autohide;
    public $color;
    public $cookiedeath;
    public $delaytime;
    public $displaydelay;
    public $element;
    public $position;


    public function componentDetails()
    {
        return [
            'name'        => 'impactfactory.elements::lang.components.toast_name',
            'description' => 'impactfactory.elements::lang.components.toast_desc'
        ];
    }

    public function defineProperties()
    {
        return [
          'autohide' => [
              'title' => 'impactfactory.elements::lang.components.toast_autohide_title',
              'type' => 'dropdown',
          ],
          'color' => [
              'title' => 'impactfactory.elements::lang.components.toast_color_title',
              'type' => 'dropdown',
          ],
          'cookiedeath' => [
              'title' => 'impactfactory.elements::lang.components.toast_cookiedeath_title',
              'type' => 'string',
          ],
          'delaytime' => [
              'title' => 'impactfactory.elements::lang.components.toast_delaytime_title',
              'type' => 'string',
          ],
          'displaydelay' => [
              'title' => 'impactfactory.elements::lang.components.toast_displaydelay_title',
              'type' => 'string',
          ],
          'element' => [
              'title' => 'impactfactory.elements::lang.components.toast_element_title',
              'type' => 'dropdown',
          ],
          'position' => [
              'title' => 'impactfactory.elements::lang.components.toast_position_title',
              'type' => 'dropdown',
          ],
        ];
    }

    public function getElementOptions()
    {
        return ElementModel::pluck('name', 'id')->toArray();
    }

    public function getAutohideOptions()
    {
        return [
          '1' => 'impactfactory.elements::lang.components.true',
          '0' => 'impactfactory.elements::lang.components.false'
        ];
    }

    public function getColorOptions()
    {
        return [
          '000' => 'impactfactory.elements::lang.components.colors_black',
          'ccc' => 'impactfactory.elements::lang.components.colors_grey',
          'fff' => 'impactfactory.elements::lang.components.colors_white',
          'sec' => 'impactfactory.elements::lang.components.colors_secondary',
          'sec-d' => 'impactfactory.elements::lang.components.colors_secondary_dark',
          'sec-l' => 'impactfactory.elements::lang.components.colors_secondary_light',
          'pri' => 'impactfactory.elements::lang.components.colors_primary',
          'pri-d' => 'impactfactory.elements::lang.components.colors_primary_dark',
          'pri-l' => 'impactfactory.elements::lang.components.colors_primary_light',
          'inf' => 'impactfactory.elements::lang.components.colors_info',
          'war' => 'impactfactory.elements::lang.components.colors_warning',
          'suc' => 'impactfactory.elements::lang.components.colors_success',
          'dan' => 'impactfactory.elements::lang.components.colors_danger'
        ];
    }

    public function getPositionOptions()
    {
        return [
          'bc' => 'impactfactory.elements::lang.components.toast_position_bottomcenter',
          'bl' => 'impactfactory.elements::lang.components.toast_position_bottomleft',
          'br' => 'impactfactory.elements::lang.components.toast_position_bottomright',
          'cc' => 'impactfactory.elements::lang.components.toast_position_centercentered',
          'tc' => 'impactfactory.elements::lang.components.toast_position_topcenter',
          'tl' => 'impactfactory.elements::lang.components.toast_position_topleft',
          'tr' => 'impactfactory.elements::lang.components.toast_position_topright'
        ];
    }

    public function onRender()
     {

        $this->element = ElementModel::find($this->property('element'));
         if($this->element) {
             $this->elements = collect($this->element->elements)->toArray();
         }

         $this->animation = $this->property('animation');
         $this->autohide = $this->property('autohide');
         $this->color = $this->property('color');
         $this->cookiedeath = $this->property('cookiedeath');
         $this->delaytime = $this->property('delaytime');
         $this->displaydelay = $this->property('displaydelay');
         $this->position = $this->property('position');
    }

}
