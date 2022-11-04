<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Model
 */
class Link extends Model
{
    use Validation;

    public $implement = [
        'RainLab.Translate.Behaviors.TranslatableModel'
    ];

    public $translatable = ['label', 'url'];


    public $table = 'impactfactory_medicalconditions_links';

    public $rules = [
         'url' => 'required'
     ];

    protected $guarded = ['*'];

    public $belongsTo = [
        'linktype' => [LinkType::class],
    ];
}
