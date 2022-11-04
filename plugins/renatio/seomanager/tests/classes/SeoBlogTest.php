<?php

namespace Renatio\SeoManager\Tests\Classes;

use Backend\Behaviors\FormController;
use RainLab\Blog\Controllers\Posts;
use RainLab\Blog\Models\Category;
use RainLab\Blog\Models\Post;
use Renatio\SeoManager\Behaviors\SeoModel;
use Renatio\SeoManager\Classes\SeoBlog;
use Renatio\SeoManager\Models\SeoTag;
use Renatio\SeoManager\Tests\TestCase;

/**
 * Class SeoBlogTest
 * @package Renatio\SeoManager\Tests\Classes
 */
class SeoBlogTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();

        $this->runPluginRefreshCommand('RainLab.Blog');

        (new SeoBlog)->extend();
    }

    /** @test */
    public function it_implements_seo_model()
    {
        $post = factory(Post::class)->make();
        $this->assertTrue($post->isClassExtendedWith(SeoModel::class));

        $category = factory(Post::class)->make();
        $this->assertTrue($category->isClassExtendedWith(SeoModel::class));
    }

    /** @test */
    public function it_adds_seo_tag_relation()
    {
        $post = factory(Post::class)->make();
        $this->assertNotEmpty($post->morphOne);
        $this->assertArrayHasKey('seo_tag', $post->morphOne);

        $category = factory(Category::class)->make();
        $this->assertNotEmpty($category->morphOne);
        $this->assertArrayHasKey('seo_tag', $category->morphOne);
    }

    /** @test */
    public function it_extends_blog_fields()
    {
        $formController = new FormController(new Posts);
        $formController->create();

        $fields = $formController->formGetWidget()->getFields();
        $model = $formController->formGetWidget()->model;

        $this->assertNotNull($model);
        $this->assertArrayHasKey('seo_tag[meta_title]', $fields);
    }

    /** @test */
    public function it_adds_dynamic_method_getSeoTab()
    {
        $post = factory(Post::class)->make();

        $this->assertEquals('secondary', $post->getSeoTab());
    }

    /** @test */
    public function it_defaults_empty_meta_title_to_post_title()
    {
        $post = $this->createModelWithSeoTag(Post::class, ['title' => 'Test']);

        $this->assertEquals('Test', $post->seo_tag->meta_title);
    }

    /** @test */
    public function it_defaults_empty_meta_description_to_post_excerpt()
    {
        $post = $this->createModelWithSeoTag(Post::class, ['excerpt' => 'Test']);

        $this->assertEquals('Test', $post->seo_tag->meta_description);
    }

    /** @test */
    public function it_defaults_empty_meta_description_to_post_content_if_empty_excerpt()
    {
        $post = $this->createModelWithSeoTag(Post::class, [
            'excerpt' => '',
            'content' => 'Test'
        ]);

        $this->assertEquals('Test', $post->seo_tag->meta_description);
    }

    /** @test */
    public function it_defaults_empty_meta_title_to_category_name()
    {
        $category = $this->createModelWithSeoTag(Category::class, ['name' => 'Test']);

        $this->assertEquals('Test', $category->seo_tag->meta_title);
    }

    /** @test */
    public function it_defaults_empty_meta_description_to_category_name()
    {
        $category = $this->createModelWithSeoTag(Category::class, ['name' => 'Test']);

        $this->assertEquals('Test', $category->seo_tag->meta_description);
    }

    /**
     * @param $class
     * @param $data
     * @return mixed
     */
    protected function createModelWithSeoTag($class, $data)
    {
        $post = factory($class)->create($data);

        $post->seo_tag()->save(new SeoTag);

        $post->load('seo_tag');

        return $post;
    }

}