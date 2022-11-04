<?php namespace ImpactFactory\Blog\Models;

use Model;
use RainLab\Translate\Behaviors\TranslatableModel;
use October\Rain\Database\Traits\Sortable;
use \October\Rain\Database\Traits\Validation;
use ImpactFactory\Blog\Models\Post; // necessary for tag cloud counting / belongstoMany definition
//use Taggable;


class Tag extends Model
{

    use \October\Rain\Database\Traits\Sluggable;

    public $implement = [
      TranslatableModel::class
    ];

    public $translatable = [
        'desc',
        'name',
        'meta_title',
        'meta_desc',
        ['slug', 'index' => true],
        'synonyms'
    ];

    protected $slugs = ['slug' => 'name'];

    public $rules = [
        'slug' => 'required',
        'name' => 'required'
    ];

    protected $jsonable = [
      'synonyms'
    ];

    // for tagcloud counting
    public $belongsToMany = [
        'posts' => [
            Post::class, 'table' => 'impactfactory_blog_post_tag'
        ]
    ];

    public function scopePublished($query)
    {
        $query->where('is_published', true);
    }

    public $table = 'impactfactory_blog_tags';


    /* needed for url translation */
    public static function translateParams($params, $oldLocale, $newLocale) {
        $newParams = $params;
        foreach ($params as $paramName => $paramValue) {
            $records = self::transWhere($paramName, $paramValue, $oldLocale)->first();
            if ($records) {
                $records->translateContext($newLocale);
                $newParams[$paramName] = $records->$paramName;
            }
        }
        return $newParams;
    }

}
