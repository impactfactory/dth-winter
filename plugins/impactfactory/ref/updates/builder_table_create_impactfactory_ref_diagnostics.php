<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryRefDiagnostics extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_ref_diagnostics', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_ref_diagnostics');
    }
}
