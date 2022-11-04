<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryJobboardApplicants4 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->text('start_date')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->date('start_date')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
