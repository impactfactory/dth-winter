<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefPatient7 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->text('kvg_no')->nullable();
            $table->text('vvg_no')->nullable();
            $table->text('kvg_other')->nullable();
            $table->text('vvg_other')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->dropColumn('kvg_no');
            $table->dropColumn('vvg_no');
            $table->dropColumn('kvg_other');
            $table->dropColumn('vvg_other');
        });
    }
}
