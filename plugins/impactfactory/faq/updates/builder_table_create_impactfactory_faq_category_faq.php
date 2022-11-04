<?php namespace ImpactFactory\Faq\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryFaqCategoryFaq extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_faq_category_faq', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('category_id');
            $table->integer('faq_id');
            $table->primary(['category_id','faq_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('impactfactory_faq_category_faq');
    }
}
