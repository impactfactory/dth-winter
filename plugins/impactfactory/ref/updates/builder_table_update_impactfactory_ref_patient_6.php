<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefPatient6 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->boolean('consilium')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->dropColumn('consilium');
        });
    }
}
