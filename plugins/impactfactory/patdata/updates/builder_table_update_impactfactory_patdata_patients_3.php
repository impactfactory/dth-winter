<?php namespace ImpactFactory\Patdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryPatdataPatients3 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_patdata_patients', function($table)
        {
            $table->date('birthday')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_patdata_patients', function($table)
        {
            $table->text('birthday')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
