<?php namespace ImpactFactory\Patdata\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryPatdataPatients2 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_patdata_patients', function($table)
        {
            $table->renameColumn('lastname', 'birthday');
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_patdata_patients', function($table)
        {
            $table->renameColumn('birthday', 'lastname');
        });
    }
}
