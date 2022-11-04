<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use \October\Rain\Database\Traits\Validation;


class Substep extends Model
{

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = ['text'];

    public $table = 'impactfactory_medicalconditions_substeps';

    public $rules = [
    ];

}
