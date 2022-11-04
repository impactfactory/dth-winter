<?php namespace Impactfactory\Jobboard\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryJobboardApplicants extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_jobboard_applicants', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('comment')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('gender');
            $table->text('firstname');
            $table->text('lastname');
            $table->text('email');
            $table->text('street_no');
            $table->text('zip');
            $table->text('city');
            $table->text('country');
            $table->text('phone');
            $table->text('birthday');
            $table->text('other_languages');
            $table->text('note');
            $table->text('cv');
            $table->text('job_posting');
            $table->text('url');
            $table->text('lang_de');
            $table->text('lang_en');
            $table->text('lang_it');
            $table->text('lang_fr');
            $table->text('salary_min');
            $table->text('salary_max');
            $table->text('experience');
            $table->text('education');
            $table->text('workquota')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('impactfactory_jobboard_applicants');
    }
}
