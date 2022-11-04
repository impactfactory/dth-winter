<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use \October\Rain\Database\Traits\Validation;
//use \Impactfactory\MedicalConditions\Models\Substep;


class Step extends Model
{

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = ['title', 'url'];

    public $table = 'impactfactory_medicalconditions_steps';

    public $rules = [
    ];

    public $belongsToMany = [
        'substeps' => [Substep::class, 'table' => 'impactfactory_medicalconditions_substep_step'],
    ];

}
