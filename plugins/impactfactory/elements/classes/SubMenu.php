<?php namespace ImpactFactory\Elements\Classes;

use RainLab\Pages\Classes\Menu as PagesMenu;

class SubMenu extends PagesMenu
{
    public function generateReferences($page)
    {
        $references = parent::generateReferences($page);

        $item = array_first($references, function($ref) {
            return $ref->isActive || $ref->isChildActive;
        });

        return $item ? $item->items : [];
    }
}
