<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class LinkType extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'impactfactory_medicalconditions_link_types';

    public $rules = [
    ];

    public $implement = [
        TranslatableModel::class
    ];
    public $translatable = ['name'];
}
