<?php namespace ImpactFactory\Patdata\Models;

use Model;

/**
 * Model
 */
class Assurance extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_patdata_assurances';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
