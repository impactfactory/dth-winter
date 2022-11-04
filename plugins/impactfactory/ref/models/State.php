<?php namespace ImpactFactory\Ref\Models;

use Model;

/**
 * Model
 */
class State extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_ref_states';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
