<?php

namespace Renatio\SeoManager\Updates;

use Artisan;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

/**
 * Class CreateSeoTagsTable
 * @package Renatio\SeoManager\Updates
 */
class CreateSeoTagsTable extends Migration
{

    /**
     * @return void
     */
    public function up()
    {
        Schema::create('renatio_seomanager_seo_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seo_tag_type')->nullable();
            $table->unsignedInteger('seo_tag_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('robot_index')->default('index')->nullable();
            $table->string('robot_follow')->default('follow')->nullable();
            $table->string('robot_advanced')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });

        Artisan::call('seo:import-cms');
        Artisan::call('seo:import-static');
        Artisan::call('seo:import-blog');
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renatio_seomanager_seo_tags');
    }
}
