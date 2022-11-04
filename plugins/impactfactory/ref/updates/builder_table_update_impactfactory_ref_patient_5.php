<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefPatient5 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->dropColumn('assurance_no');
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->text('assurance_no')->nullable();
        });
    }
}
