<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryJobboardStates extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_jobboard_states', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('title');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_jobboard_states');
    }
}
