<?php

namespace Renatio\SeoManager\Tests\Classes;

use RainLab\Pages\Classes\Page;
use Renatio\SeoManager\Classes\SeoStaticPage;
use Renatio\SeoManager\Tests\TestCase;

/**
 * Class SeoStaticPageTest
 * @package Renatio\SeoManager\Tests\Classes
 */
class SeoStaticPageTest extends TestCase
{

    /**
     * @var
     */
    protected $page;

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();

        $this->runPluginRefreshCommand('RainLab.Pages');

        (new SeoStaticPage)->extend();

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
        $this->assertArrayHasKey('meta_title', $this->page->attributes['viewBag']);
        $this->assertEquals('Test', $this->page->attributes['viewBag']['meta_title']);
    }

    /**
     * @return Page
     */
    protected function createPage()
    {
        $data['settings']['viewBag'] = [
            'title' => 'Test',
            'url' => '/',
            'fileName' => 'test.htm',
            'meta_title' => 'Test',
        ];

        $page = new Page;
        $page->rules['url'] = '';
        $page->fill($data);
        $page->save();

        return $page;
    }

}