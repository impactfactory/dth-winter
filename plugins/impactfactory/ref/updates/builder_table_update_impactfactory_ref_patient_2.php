<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefPatient2 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->integer('state_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->dropColumn('state_id');
        });
    }
}
