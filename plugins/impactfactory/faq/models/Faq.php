<?php namespace ImpactFactory\Faq\Models;

use October\Rain\Database\Model;
use October\Rain\Database\Traits\Sortable;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class Faq extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sortable;

    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = [
        'question', 'answer'
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
    public $table = 'impactfactory_faq_faqs';

    public $belongsToMany = [
        'categories' => [
            Category::class, 'table' => 'impactfactory_faq_category_faq'
        ]
    ];
}
