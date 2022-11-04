<?php namespace ImpactFactory\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryServicesOrders extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_services_orders', function($table)
        {
            $table->text('rep_typ')->nullable();
            $table->integer('rep_prev_type')->nullable();
            $table->text('rep_ldl_value')->nullable();
            $table->date('rep_ldl_date')->nullable();
            $table->integer('rep_therapy_statin')->nullable();
            $table->text('rep_therapy_statin_1')->nullable();
            $table->text('rep_therapy_statin_2')->nullable();
            $table->text('rep_therapy_nostatin')->nullable();
            $table->integer('rep_therapy_nostatin_type')->nullable();
            $table->string('rep_therapy_ezetimib')->nullable();
            $table->integer('rep_therapy_pressure')->nullable();
            $table->integer('rep_therapy_sugar')->nullable();
            $table->integer('rep_therapy_nico')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_services_orders', function($table)
        {
            $table->dropColumn('rep_typ');
            $table->dropColumn('rep_prev_type');
            $table->dropColumn('rep_ldl_value');
            $table->dropColumn('rep_ldl_date');
            $table->dropColumn('rep_therapy_statin');
            $table->dropColumn('rep_therapy_statin_1');
            $table->dropColumn('rep_therapy_statin_2');
            $table->dropColumn('rep_therapy_nostatin');
            $table->dropColumn('rep_therapy_nostatin_type');
            $table->dropColumn('rep_therapy_ezetimib');
            $table->dropColumn('rep_therapy_pressure');
            $table->dropColumn('rep_therapy_sugar');
            $table->dropColumn('rep_therapy_nico');
        });
    }
}
