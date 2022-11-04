<?php

namespace Renatio\SeoManager\Tests\Classes;

use Renatio\SeoManager\Classes\SeoFields;
use Renatio\SeoManager\Models\Settings;
use Renatio\SeoManager\Tests\TestCase;

/**
 * Class SeoFieldsTest
 * @package Renatio\SeoManager\Tests\Classes
 */
class SeoFieldsTest extends TestCase
{

    /** @test */
    public function it_returns_all_seo_fields()
    {
        $fields = $this->fields();

        $this->assertNotEmpty($fields);
        $this->assertArrayHasKey('seo_tag[meta_title]', $fields);
        $this->assertArrayHasKey('seo_tag[og_title]', $fields);
    }

    /** @test */
    public function it_returns_seo_fields_without_og_fields()
    {
        Settings::set('og_enabled', false);
        $fields = $this->fields();

        $this->assertArrayNotHasKey('seo_tag[og_title]', $fields);
    }

    /** @test */
    public function it_returns_seo_fields_keys()
    {
        $keys = (new SeoFields)->keys();

        $this->assertArrayNotHasKey('seo_tag[meta_title]', $keys);
        $this->assertContains('meta_title', $keys);
    }

    /**
     * @return array
     */
    protected function fields()
    {
        return (new SeoFields)->fields();
    }

}