<?php

namespace Database\Test\Models;

use Model;

/**
 * Class Post
 * @package Database\Test\Models
 */
class Post extends Model
{

    /**
     * @var string
     */
    public $table = 'database_tester_posts';

    /**
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * @var array
     */
    public $implement = ['@Renatio.SeoManager.Behaviors.SeoModel'];

}