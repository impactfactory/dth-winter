<?php namespace ImpactFactory\Blog\Models;

use Model;
use RainLab\Translate\Behaviors\TranslatableModel;
use October\Rain\Database\Traits\Sortable;
use \October\Rain\Database\Traits\Validation;


class Category extends Model
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
        'meta_keywords',
        ['slug', 'index' => true],
        'synonyms'
    ];

    protected $slugs = ['slug' => 'title'];

    public $rules = [
        'slug' => 'required',
        'name' => 'required'
    ];

    public function scopePublished($query)
    {
        $query->where('is_published', true);
    }

    protected $jsonable = [
      'synonyms'
    ];

    public $table = 'impactfactory_blog_cats';

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
