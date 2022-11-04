<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefPatAss extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_ref_pat_ass', function($table)
        {
            $table->integer('patient_id');
            $table->integer('assurance_id');
            $table->primary(['patient_id','assurance_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('impactfactory_ref_pat_ass', function($table)
        {
            $table->dropPrimary(['patient_id','assurance_id']);
            $table->dropColumn('patient_id');
            $table->dropColumn('assurance_id');
        });
    }
}
