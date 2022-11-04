<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteImpactfactoryJobboardApplicantState extends Migration
{
    public function up()
    {
        Schema::dropIfExists('impactfactory_jobboard_applicant_state_');
    }
    
    public function down()
    {
        Schema::create('impactfactory_jobboard_applicant_state_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('applicant_id');
            $table->integer('state_id');
        });
    }
}
