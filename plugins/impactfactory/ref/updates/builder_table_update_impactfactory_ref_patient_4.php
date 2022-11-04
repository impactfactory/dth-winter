<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefPatient4 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->integer('kvg_id')->nullable();
            $table->integer('vvg_id')->nullable();
            $table->dropColumn('kvg');
            $table->dropColumn('vvg');
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_patient', function($table)
        {
            $table->dropColumn('kvg_id');
            $table->dropColumn('vvg_id');
            $table->integer('kvg')->nullable();
            $table->integer('vvg')->nullable();
        });
    }
}
