<?php namespace ImpactFactory\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryServicesAssurances extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_services_assurances', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name');
            $table->text('street_no')->nullable();
            $table->text('zip')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->boolean('published');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_services_assurances');
    }
}
