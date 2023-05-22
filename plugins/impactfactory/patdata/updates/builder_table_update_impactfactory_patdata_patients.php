<?php namespace ImpactFactory\Patdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryPatdataPatients extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_patdata_patients', function($table)
        {
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_patdata_patients', function($table)
        {
            $table->dropColumn('updated_at');
        });
    }
}
