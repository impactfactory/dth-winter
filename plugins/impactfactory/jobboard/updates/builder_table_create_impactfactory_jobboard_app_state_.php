<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryJobboardAppState extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_jobboard_app_state_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('applicant_id');
            $table->integer('state_id');
            $table->primary(['applicant_id','state_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_jobboard_app_state_');
    }
}
