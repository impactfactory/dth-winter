<?php namespace Impactfactory\Patreg\Models;

use Model;

/**
 * Model
 */
class Patients extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_patreg_pats';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}


/*
use Model;
use DB;


class Applicants extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    public function getFullNameAttribute()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public $table = 'impactfactory_jobboard_applicants';

    /**
     * @var array Validation rules
     
    public $rules = [
    ];

    public $attachMany = [
        'files' => 'System\Models\File',
    ];

    public $belongsTo = [
        'state' => [States::class],
        'job' => [Jobs::class]
    ];

    
}
*/
