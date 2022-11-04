<?php namespace Impactfactory\MedicalConditions\Components;

use Cms\Classes\ComponentBase;
use ImpactFactory\MedicalConditions\Models\MedicalCondition;

class ConditionSchema extends ComponentBase
{
    public $condition;

    public function componentDetails()
    {
        return [
            'name'        => 'MedSEO: Basis-Schema',
            'description' => 'baut ein MedicalCondition-Schema in den Head ein'
        ];
    }


    public function defineProperties()
    {
        return [
            'condition' => [
                'title' => 'Medizinische Kondition',
                'type' => 'dropdown',
            ]
        ];
    }

    public function getConditionOptions()
    {
        return MedicalCondition::pluck('name', 'id')->toArray();
    }

    public function onRun()
    {
        $this->condition = MedicalCondition::find($this->property('condition'));
    }
}
