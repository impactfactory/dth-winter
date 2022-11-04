<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use \October\Rain\Database\Traits\Validation;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class Book extends Model
{


    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = [
        'author',
        'desc',
        'name',
        'url'
    ];

    public $table = 'impactfactory_medicalconditions_books';

    public $rules = [
    ];
}
