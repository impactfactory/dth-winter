<?php namespace ImpactFactory\Team\Models;

use Model;
use October\Rain\Database\Traits\SimpleTree;
use October\Rain\Database\Traits\Sortable;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class Organisation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    //use Sortable;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = [
        'desc',
        'name',
        'subtitle',
        'desc',
        'schema_address',
        'schema_author_name',
        'schema_author_url',
        'schema_city',
        'schema_copyright',
        'schema_country',
        'schema_img',
        'schema_desc',
        'schema_founder_jobtitle',
        'schema_founder_url',
        'schema_logo',
        'schema_name',
        'schema_map_url',
        'schema_photo',
        'schema_region',
        'schema_site_name',
        'schema_speciality',
        'schema_url',
        'url'
    ];

    protected $jsonable = [
          'schema_service',
          'schema_speciality',
          'schema_type',
          'socials'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_team_organisations';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required'
    ];

    public $hasMany = [
        'teams' => [Team::class]
    ];

    public function scopePublished($query)
    {
        $query->where('is_published', true);
        return $query;
    }
}
