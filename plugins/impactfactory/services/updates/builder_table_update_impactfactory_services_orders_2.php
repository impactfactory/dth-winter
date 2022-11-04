<?php namespace ImpactFactory\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryServicesOrders2 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_services_orders', function($table)
        {
            $table->integer('rep_success_ldl')->nullable();
            $table->integer('rep_success_date')->nullable();
            $table->text('rep_success_expl')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_services_orders', function($table)
        {
            $table->dropColumn('rep_success_ldl');
            $table->dropColumn('rep_success_date');
            $table->dropColumn('rep_success_expl');
        });
    }
}
