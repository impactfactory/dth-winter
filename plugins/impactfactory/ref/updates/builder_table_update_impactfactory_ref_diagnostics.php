<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefDiagnostics extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_diagnostics', function($table)
        {
            $table->integer('sort_order')->default(100)->change();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_diagnostics', function($table)
        {
            $table->integer('sort_order')->default(null)->change();
        });
    }
}
