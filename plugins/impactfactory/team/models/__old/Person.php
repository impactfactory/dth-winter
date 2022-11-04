<?php namespace ImpactFactory\Team\Models;

use Model;
use October\Rain\Database\Traits\Sortable;
use RainLab\Translate\Behaviors\TranslatableModel;
use RainLab\Translate\Classes\Translator;
use System\Models\File;

/**
 * Model
 */
class Person extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;
    use Sortable;

    protected $slugs = [
      'slug' => ['first_name', 'last_name']
    ];

    public $implement = [
      TranslatableModel::class
    ];



    public $translatable = [
        'boxtext',
        'boxlink',
        'city',
        'country',
        ['role', 'index' => true],
        ['slug', 'index' => true],
        ['availability', 'index' => true],
        ['url', 'url' => true],
        ['background', 'index' => true],
        'honorific',
        'milestones',
        'skills',
        'jobs',
        'educations',
        'seo_desc',
        'testimonials',
        ['testimonials_title', 'index' => true],
        'memberships',
        'publications',
        'publications_text',
        ['map_title', 'index' => true],
        ['map_intro', 'index' => true],

    ];

    /*
     * Validation
     */
    public $rules = [
        'url' => 'url',
        'email' => 'email',
        'slug' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'role' => 'required'
    ];

    public $appends = [
        'name'
    ];

    protected $jsonable = [
          'milestones',
          'educations',
          'skills',
          'jobs',
          'testimonials',
          'memberships',
          'publications'
    ];

    public function scopePublished($query)
    {
        $query->where('is_published', 1);
        return $query;
    }

    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_team_people';

    public $belongsToMany = [
        'teams' => [Team::class, 'table' => 'impactfactory_team_person_team']
    ];

    //public $attachMany = [
      //    'images' => [File::class, 'delete' => true],
      //];

    public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }
}
