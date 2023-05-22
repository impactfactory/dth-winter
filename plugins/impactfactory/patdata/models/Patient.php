<?php namespace ImpactFactory\Patdata\Models;

use Model;
use System\Models\File;
use DB;
use ImpactFactory\Patdata\Models\Assurance;
use RainLab\Translate\Models\Message;


/**
 * Model
 */
class Patient extends Model
{
    //use \Winter\Storm\Database\Traits\Validation;

    public $table = 'impactfactory_patdata_patients';

    //Validation
    public $guarded = ['id', 'created_at'];

    /* public $rules = [
       'firstname' => 'required|min:2',
        'lastname' => 'required|min:2',
        'birthday' => 'required',
        /*
        'doc_lastname' => 'max:20',
        'doc_city' => 'max:30',
        'doc_phone' => 'required|max:30',
        'doc_email' => 'required|email',
        'doc2_email' => 'email',
        'gender' => 'max:30',
        'firstname' => 'required|max:30',
        'lastname' => 'required|max:30',
        'street_no' => 'max:30',
        'zip' => 'max:6',
        'city' => 'max:30',
        'phone' => 'required|max:30',
        'phone' => 'max:30',
        'email' => 'email|required|max:30',
        'birthday' => 'max:30',
        'costcarry' => 'max:30',
        'kvg_id' => 'max:3',
        'vvg_id' => 'max:3',
        'lastdate' => 'max:30',
        'question' => 'max:1000',
        'clinical' => 'max:1000',
        'note' => 'max:300',
        
    ];

    public $customMessages = [];*/

}
