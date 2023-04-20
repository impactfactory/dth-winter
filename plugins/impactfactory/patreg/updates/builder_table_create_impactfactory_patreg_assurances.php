<?php namespace Impactfactory\Patreg\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryPatregAssurances extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_patreg_assurances', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name');
            $table->text('type');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_patreg_assurances');
    }
}
