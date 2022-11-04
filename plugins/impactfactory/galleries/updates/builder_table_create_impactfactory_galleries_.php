<?php namespace Impactfactory\Galleries\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryGalleries extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_galleries_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->boolean('is_published')->nullable()->default(0);
            $table->text('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_galleries_');
    }
}
