<?php

namespace Renatio\SeoManager\Tests;

use Illuminate\Database\Eloquent\Factory;
use PluginTestCase;

/**
 * Class TestCase
 * @package Renatio\SeoManager\Tests
 */
class TestCase extends PluginTestCase
{

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->changeDefaultFactoriesPath();
    }

    /**
     * @return void
     */
    protected function changeDefaultFactoriesPath()
    {
        $this->app->singleton(Factory::class, function () {
            $faker = $this->app->make('Faker\Generator');

            return Factory::construct($faker, base_path('plugins/renatio/seomanager/tests/factories'));
        });
    }

}