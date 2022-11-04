<?php namespace Impactfactory\Galleries\Models;

use Model;
use System\Models\File;

/**
 * Model
 */
class Gallery extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_galleries_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachMany = [
        'images' => [File::class, 'delete' => true],
    ];
}
