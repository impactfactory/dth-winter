<?php namespace ImpactFactory\Patdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryPatdataPatients extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_patdata_patients', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->text('lastname')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_patdata_patients');
    }
}
