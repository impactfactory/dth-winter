<?php namespace ImpactFactory\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryFaqFaqs extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_faq_faqs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('question');
            $table->text('answer');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(0)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('impactfactory_faq_faqs');
    }
}
