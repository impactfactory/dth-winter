<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryJobboardApplicants2 extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->text('birthday')->nullable()->change();
            $table->text('city')->nullable()->change();
            $table->text('country')->nullable()->change();
            $table->text('cv')->nullable()->change();
            $table->text('education')->nullable()->change();
            $table->text('email')->nullable()->change();
            $table->text('experience')->nullable()->change();
            $table->text('firstname')->nullable()->change();
            $table->text('gender')->nullable()->change();
            $table->text('job_posting')->nullable()->change();
            $table->text('lang_de')->nullable()->change();
            $table->text('lang_en')->nullable()->change();
            $table->text('lang_fr')->nullable()->change();
            $table->text('lang_it')->nullable()->change();
            $table->text('lastname')->nullable()->change();
            $table->text('note')->nullable()->change();
            $table->text('other_languages')->nullable()->change();
            $table->text('phone')->nullable()->change();
            $table->text('salary_max')->nullable()->change();
            $table->text('salary_min')->nullable()->change();
            $table->text('sort_order')->nullable()->change();
            $table->text('street_no')->nullable()->change();
            $table->text('url')->nullable()->change();
            $table->text('zip')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('impactfactory_jobboard_applicants', function($table)
        {
            $table->text('birthday')->nullable(false)->change();
            $table->text('city')->nullable(false)->change();
            $table->text('country')->nullable(false)->change();
            $table->text('cv')->nullable(false)->change();
            $table->text('education')->nullable(false)->change();
            $table->text('email')->nullable(false)->change();
            $table->text('experience')->nullable(false)->change();
            $table->text('firstname')->nullable(false)->change();
            $table->text('gender')->nullable(false)->change();
            $table->text('job_posting')->nullable(false)->change();
            $table->text('lang_de')->nullable(false)->change();
            $table->text('lang_en')->nullable(false)->change();
            $table->text('lang_fr')->nullable(false)->change();
            $table->text('lang_it')->nullable(false)->change();
            $table->text('lastname')->nullable(false)->change();
            $table->text('note')->nullable(false)->change();
            $table->text('other_languages')->nullable(false)->change();
            $table->text('phone')->nullable(false)->change();
            $table->text('salary_max')->nullable(false)->change();
            $table->text('salary_min')->nullable(false)->change();
            $table->text('sort_order')->nullable(false)->change();
            $table->text('street_no')->nullable(false)->change();
            $table->text('url')->nullable(false)->change();
            $table->text('zip')->nullable(false)->change();
        });
    }
}
