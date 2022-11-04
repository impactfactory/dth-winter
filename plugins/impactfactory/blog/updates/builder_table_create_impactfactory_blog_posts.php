<?php namespace ImpactFactory\Blog\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryBlogPosts extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_blog_posts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('author_id')->nullable();
            $table->text('content')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->text('excerpt')->nullable();
            $table->increments('id')->unsigned();
            $table->string('img')->nullable();
            $table->boolean('is_published');
            $table->text('meta_desc')->nullable();
            $table->string('meta_img')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('searchtags')->nullable();
            $table->text('slug');
            $table->text('subtitle')->nullable();
            $table->integer('sort_order')->nullable();
            $table->integer('timetoread')->nullable();
            $table->text('title');
            $table->integer('type_id')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('crop_area')->nullable();
            $table->integer('edit_id')->nullable();
        });

        Schema::create('impactfactory_blog_cats', function($table)
        {
            $table->engine = 'InnoDB';
            $table->timestamp('created_at')->nullable();
            $table->increments('id')->unsigned();
            $table->boolean('is_published');
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('meta_img')->nullable();
            $table->text('name');
            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('searchtags')->nullable();
            $table->text('synonyms')->nullable();
            $table->text('slug');
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('impactfactory_blog_tags', function($table)
        {
            $table->engine = 'InnoDB';
            $table->timestamp('created_at')->nullable();
            $table->text('desc')->nullable();
            $table->increments('id')->unsigned();
            $table->boolean('is_published');
            $table->string('img')->nullable();
            $table->text('meta_desc')->nullable();
            $table->string('meta_img')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('name');
            $table->text('searchtags')->nullable();
            $table->string('slug');
            //$table->text('synonyms')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('impactfactory_blog_post_cat', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('post_id');
            $table->integer('category_id');
            $table->primary(['post_id','category_id']);
        });

        Schema::create('impactfactory_blog_post_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('post_id');
            $table->integer('tag_id');
            $table->primary(['post_id','tag_id']);
        });

        Schema::create('impactfactory_blog_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
        });

        Schema::create('impactfactory_blog_edits', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->string('color');
        });


    }

    public function down()
    {
        Schema::dropIfExists('impactfactory_blog_posts');
        Schema::dropIfExists('impactfactory_blog_cats');
        Schema::dropIfExists('impactfactory_blog_tags');
        Schema::dropIfExists('impactfactory_blog_post_cat');
        Schema::dropIfExists('impactfactory_blog_post_tag');
        Schema::dropIfExists('impactfactory_blog_types');
        Schema::dropIfExists('impactfactory_blog_edits');
    }
}
