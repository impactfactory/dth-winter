<?php namespace ImpactFactory\Ref\Models;

use Model;
use October\Rain\Database\Traits\Sortable;

/**
 * Model
 */
class Diagnostic extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sortable;

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'name',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_ref_diagnostics';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
