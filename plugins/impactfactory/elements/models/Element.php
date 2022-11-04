<?php namespace ImpactFactory\Elements\Models;

use Model;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class Element extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = [
        'elements',
        'text'
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /*
     * Validation
     */
     public $rules = [
         'name' => 'required',
         'from' => 'required',
         'to' => 'required',
     ];

    public $jsonable = [
        'elements',
    ];

    //public function scopePublished($query)
      //{
      //    $query->where('is_published', true)
      //        ->where('end', '>=', Carbon::now()->setTime(0, 0, 0, 0));
  //
      //    return $query;
      //}

    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_elements_elements';
}
