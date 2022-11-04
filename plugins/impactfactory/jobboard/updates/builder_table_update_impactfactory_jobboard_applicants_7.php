<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryJobboardApplicants7 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->text('file_2')->nullable();
            $table->text('file_3')->nullable();
            $table->text('file_4')->nullable();
            $table->text('file_5')->nullable();
            $table->renameColumn('cv', 'file_1');
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->dropColumn('file_2');
            $table->dropColumn('file_3');
            $table->dropColumn('file_4');
            $table->dropColumn('file_5');
            $table->renameColumn('file_1', 'cv');
        });
    }
}
