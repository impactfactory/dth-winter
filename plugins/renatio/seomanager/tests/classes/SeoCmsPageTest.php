<?php

namespace Renatio\SeoManager\Tests\Classes;

use Cms\Classes\Page;
use Renatio\SeoManager\Classes\SeoCmsPage;
use Renatio\SeoManager\Tests\TestCase;

/**
 * Class SeoCmsPageTest
 * @package Renatio\SeoManager\Tests\Classes
 */
class SeoCmsPageTest extends TestCase
{

    /**
     * @var
     */
    protected $page;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        (new SeoCmsPage)->extend();

        $this->page = $this->createPage();
    }

    /**
     * @return void
     */
    public function tearDown()
    {
        $this->page->delete();

        parent::tearDown();
    }

    /** @test */
    public function it_modifies_page_properties()
    {
        $this->assertNull($this->page->translatable);

        $this->assertArrayHasKey('meta_title', $this->page->attributes);
        $this->assertEquals('Test', $this->page->attributes['meta_title']);
    }

    /**
     * @return static
     */
    protected function createPage()
    {
        return Page::create([
            'title' => 'Test',
            'url' => '/',
            'fileName' => 'test.htm',
            'meta_title' => 'Test',
        ]);
    }

}