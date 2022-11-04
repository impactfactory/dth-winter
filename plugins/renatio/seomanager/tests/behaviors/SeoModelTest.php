<?php

namespace Renatio\SeoManager\Tests\Behaviors;

use Database\Test\Models\Post;
use Renatio\SeoManager\Behaviors\SeoModel;
use Renatio\SeoManager\Tests\TestCase;

/**
 * Class SeoModelTest
 * @package Renatio\SeoManager\Tests\Behaviors
 */
class SeoModelTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();

        include_once __DIR__ . '/../fixtures/models/Post.php';

        $this->runPluginRefreshCommand('Database.Tester');
    }

    /** @test */
    public function it_adds_morph_one_relation_to_model()
    {
        $post = factory(Post::class)->make();

        $this->assertTrue($post->isClassExtendedWith(SeoModel::class));
        $this->assertNotEmpty($post->morphOne);
        $this->assertArrayHasKey('seo_tag', $post->morphOne);
    }

}