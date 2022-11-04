<?php namespace ImpactFactory\Elements\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryElementsElements extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_elements_elements', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->dateTime('from')->nullable();
            $table->dateTime('to')->nullable();
            $table->string('name', 255);
            $table->text('text')->nullable();
            $table->text('elements');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('impactfactory_elements_elements');
    }
}
