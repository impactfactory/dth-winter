<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryRefStates extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_ref_states', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_ref_states');
    }
}
