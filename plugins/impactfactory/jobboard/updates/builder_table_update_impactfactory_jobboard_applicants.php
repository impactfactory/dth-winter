<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryJobboardApplicants extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->text('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
