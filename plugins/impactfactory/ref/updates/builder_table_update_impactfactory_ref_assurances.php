<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefAssurances extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_assurances', function($table)
        {
            $table->text('type')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_assurances', function($table)
        {
            $table->dropColumn('type');
        });
    }
}
