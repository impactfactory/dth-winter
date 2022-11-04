<?php namespace ImpactFactory\Services\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryServicesOrders extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_services_orders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('pat_gender')->nullable();
            $table->text('pat_firstname')->nullable();
            $table->text('pat_lastname')->nullable();
            $table->text('pat_birthday')->nullable();
            $table->text('pat_street_no')->nullable();
            $table->text('pat_zip')->nullable();
            $table->text('pat_city')->nullable();
            $table->text('pat_ass_no')->nullable();
            $table->text('doc_gender')->nullable();
            $table->text('doc_honoric')->nullable();
            $table->text('doc_firstname')->nullable();
            $table->text('doc_lastname')->nullable();
            $table->text('doc_company')->nullable();
            $table->text('doc_street_no')->nullable();
            $table->text('doc_zip')->nullable();
            $table->text('doc_city')->nullable();
            $table->text('doc_country')->nullable();
            $table->text('doc_phone')->nullable();
            $table->text('doc_email')->nullable();
            $table->text('pat_phone')->nullable();
            $table->text('pat_email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_services_orders');
    }
}
