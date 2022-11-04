<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryRefPatDia extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_ref_pat_dia', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('patient_id');
            $table->integer('diagnostic_id');
            $table->primary(['patient_id','diagnostic_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('impactfactory_ref_pat_dia');
    }
}
