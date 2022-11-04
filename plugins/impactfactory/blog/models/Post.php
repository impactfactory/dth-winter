<?php namespace ImpactFactory\Blog\Models;

use Model;
//use \October\Rain\Database\Traits\Sluggable;
use \October\Rain\Database\Traits\Validation;
use ImpactFactory\Team\Models\Person;
use ImpactFactory\Blog\Models\Type;
use ImpactFactory\Blog\Models\Edit;
use October\Rain\Database\Traits\Sortable;


class Post extends Model
{

    use \October\Rain\Database\Traits\Sluggable;
    use Sortable;

    public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

    public $translatable = [
        'content',
        'excerpt',
        'meta_title',
        'meta_desc',
        'meta_keywords',
        ['slug', 'index' => true],
        'subtitle',
        ['title', 'index' => true],
    ];

    protected $slugs = ['slug' => 'title'];

    public $table = 'impactfactory_blog_posts';

    public $rules = [
        'slug' => 'required',
        'title' => 'required'
    ];

    public function scopePublished($query)
    {
        $query->where('is_published', true);
    }

    public $belongsToMany = [
        'categories' => [
            Category::class, 'table' => 'impactfactory_blog_post_cat'
        ],
        'tags' => [
            Tag::class, 'table' => 'impactfactory_blog_post_tag'
        ]
    ];

    public $belongsTo = [
        'author' => [
            Person::class
          ],
        'type' => [
            Type::class
          ],
        'edit' => [
              Edit::class
            ],

    ];

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
