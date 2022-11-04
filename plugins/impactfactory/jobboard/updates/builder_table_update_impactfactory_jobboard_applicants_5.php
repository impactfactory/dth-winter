<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryJobboardApplicants5 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->string('cv')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->text('cv')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
