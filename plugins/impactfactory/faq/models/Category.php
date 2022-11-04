<?php namespace ImpactFactory\Faq\Models;

use Model;
use October\Rain\Database\Traits\Sortable;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sortable;

    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = [
        'name'
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
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_faq_categories';

    public $belongsToMany = [
        'faqs' => [
            Faq::class, 'table' => 'impactfactory_faq_category_faq'
        ]
    ];
}
