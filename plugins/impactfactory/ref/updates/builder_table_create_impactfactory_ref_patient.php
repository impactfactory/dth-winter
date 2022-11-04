<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryRefPatient extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_ref_patient', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('gender');
            $table->text('firstname');
            $table->text('lastname');
            $table->text('birthday');
            $table->text('street_no');
            $table->text('zip');
            $table->text('city');
            $table->text('phone');
            $table->text('email');
            $table->text('assurance_no')->nullable();
            $table->text('costcarry');
            $table->text('lastdate');
            $table->text('clinical');
            $table->text('question');
            $table->text('diagnostics');
            $table->text('note')->nullable();
            $table->text('doc_firstname');
            $table->text('doc_lastname');
            $table->text('doc_city')->nullable();
            $table->text('doc_email');
            $table->text('doc_phone')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_ref_patient');
    }
}
