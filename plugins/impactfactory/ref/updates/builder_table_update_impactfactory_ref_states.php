<?php namespace ImpactFactory\Ref\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryRefStates extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_ref_states', function($table)
        {
            $table->string('color', 191);
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_ref_states', function($table)
        {
            $table->dropColumn('color');
        });
    }
}
