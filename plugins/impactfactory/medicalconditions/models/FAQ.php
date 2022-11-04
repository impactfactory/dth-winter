<?php namespace Impactfactory\MedicalConditions\Models;

use Model;

/**
 * Model
 */
class FAQ extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = ['question', 'answer'];

    public $table = 'impactfactory_medicalconditions_faqs';

    public $rules = [
    ];
}
