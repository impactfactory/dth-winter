<?php namespace ImpactFactory\Services\Models;

use Model;

/**
 * Model
 */
class Type extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_services_types';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
