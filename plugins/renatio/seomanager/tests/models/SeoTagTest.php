<?php

namespace Renatio\SeoManager\Tests\Models;

use Database\Test\Models\Post;
use Renatio\SeoManager\Models\SeoTag;
use Renatio\SeoManager\Tests\TestCase;

/**
 * Class SeoTagTest
 * @package Renatio\SeoManager\Tests\Models
 */
class SeoTagTest extends TestCase
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
    public function it_creates_seo_tag()
    {
        $post = factory(Post::class)->create();

        $seoTag = factory(SeoTag::class)->create([
            'seo_tag_id' => $post->id,
            'seo_tag_type' => Post::class,
        ]);

        $this->assertEquals(1, $seoTag->id);
    }

}