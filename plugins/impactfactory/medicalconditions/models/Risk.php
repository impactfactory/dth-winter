<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use \October\Rain\Database\Traits\Validation;


class Risk extends Model
{

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = ['name', 'url'];

    public $table = 'impactfactory_medicalconditions_risks';

    public $rules = [
    ];
}
