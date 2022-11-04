<?php namespace Impactfactory\Medicalconditions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactfactoryMedicalconditions extends Migration
{
    public function up()
    {
        Schema::create('impactfactory_medicalconditions_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('alt_names')->nullable();
            $table->text('anatomy')->nullable();
            $table->text('codesystem')->nullable();
            $table->text('codevalue')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->text('desc')->nullable();
            $table->text('differential')->nullable();
            $table->text('distinguishing_signs')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_published')->nullable();
            $table->text('g_name')->nullable();
            $table->text('g_desc')->nullable();
            $table->text('g_ev')->nullable();
            $table->text('g_origin')->nullable();
            $table->text('g_recomm')->nullable();
            $table->text('how_desc')->nullable();
            $table->text('how_image')->nullable();
            $table->text('how_name')->nullable();
            $table->text('how_supplyname')->nullable();
            $table->text('how_totalcost')->nullable();
            $table->text('how_toolname')->nullable();
            $table->text('how_totaltime')->nullable();
            $table->text('name')->nullable();
            $table->text('speciality')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('wiki')->nullable();
        });

        Schema::create('impactfactory_medicalconditions_books', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name');
            $table->text('desc')->nullable();
            $table->text('cover')->nullable();
            $table->text('url')->nullable();
            $table->text('author')->nullable();
            $table->boolean('is_published')->nullable()->default(0);
        });

        Schema::create('impactfactory_medicalconditions_book_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('book_id');
            $table->integer('medical_condition_id');
            $table->primary(['book_id','medical_condition_id']);
        });

        Schema::create('impactfactory_medicalconditions_faqs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('question');
            $table->text('answer');
        });

        Schema::create('impactfactory_medicalconditions_faq_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('f_a_q_id');
            $table->integer('medical_condition_id');
            $table->primary(['f_a_q_id','medical_condition_id']);
        });

        Schema::create('impactfactory_medicalconditions_links', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('label');
            $table->text('url');
            $table->text('typ')->nullable();
            $table->integer('linktype_id')->nullable();
            $table->integer('medicalcondition_id')->nullable();
            $table->text('label')->nullable()->change();
            $table->text('url')->nullable()->change();
            $table->dropColumn('typ');



        });

        Schema::create('impactfactory_medicalconditions_link_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('link_id');
            $table->integer('medical_condition_id');
            $table->primary(['link_id','medical_condition_id']);
        });

        Schema::create('impactfactory_medicalconditions_link_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('impactfactory_medicalconditions_risks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name');
            $table->text('url')->nullable();
        });

        Schema::create('impactfactory_medicalconditions_risk_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('risk_id');
            $table->integer('medical_condition_id');
            $table->primary(['risk_id','medical_condition_id']);
        });

        Schema::create('impactfactory_medicalconditions_steps', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name');
            $table->text('image')->nullable();
            $table->text('url')->nullable();
            $table->text('title');
        });

        Schema::create('impactfactory_medicalconditions_step_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('step_id');
            $table->integer('medical_condition_id');
            $table->primary(['step_id','medical_condition_id']);
        });

        Schema::create('impactfactory_medicalconditions_substeps', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('title')->nullable();
            $table->text('text')->nullable();
            $table->text('type')->nullable();
        });

        Schema::create('impactfactory_medicalconditions_substep_step', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('substep_id');
            $table->integer('step_id');
            $table->primary(['substep_id','step_id']);
        });

        Schema::create('impactfactory_medicalconditions_symptoms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('url')->nullable();
            $table->text('name')->nullable(false);
            $table->integer('tag_id')->nullable();
        });

        Schema::create('impactfactory_medicalconditions_symptom_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('symptom_id');
            $table->integer('medical_condition_id');
            $table->primary(['symptom_id','medical_condition_id']);
        });

        Schema::create('impactfactory_medicalconditions_tests', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('name');
            $table->text('url')->nullable();
            $table->integer('tag_id')->nullable();
        });

        Schema::create('impactfactory_medicalconditions_test_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('test_id');
            $table->integer('medical_condition_id');
            $table->primary(['test_id','medical_condition_id']);
        });

        Schema::create('impactfactory_medicalconditions_treatments', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->text('name');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('tag_id')->nullable();
            $table->text('url')->nullable();
        });

        Schema::create('impactfactory_medicalconditions_treatment_condition', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('treatment_id');
            $table->integer('medical_condition_id');
            $table->primary(['treatment_id','medical_condition_id']);

        });
    }




    public function down()
    {
        Schema::dropIfExists('impactfactory_medicalconditions_');
        Schema::dropIfExists('impactfactory_medicalconditions_books');
        Schema::dropIfExists('impactfactory_medicalconditions_book_condition');
        Schema::dropIfExists('impactfactory_medicalconditions_faqs');
        Schema::dropIfExists('impactfactory_medicalconditions_faq_condition');
        Schema::dropIfExists('impactfactory_medicalconditions_links');
        Schema::dropIfExists('impactfactory_medicalconditions_condition');
        Schema::dropIfExists('impactfactory_medicalconditions_link_types');
        Schema::dropIfExists('impactfactory_medicalconditions_risks');
        Schema::dropIfExists('impactfactory_medicalconditions_risk_condition');
        Schema::dropIfExists('impactfactory_medicalconditions_steps');
        Schema::dropIfExists('impactfactory_medicalconditions_step_condition');
        Schema::dropIfExists('impactfactory_medicalconditions_substeps');
        Schema::dropIfExists('impactfactory_medicalconditions_substep_step');
        Schema::dropIfExists('impactfactory_medicalconditions_symptoms');
        Schema::dropIfExists('impactfactory_medicalconditions_symptom_condition');
        Schema::dropIfExists('impactfactory_medicalconditions_tests');
        Schema::dropIfExists('impactfactory_medicalconditions_test_condition');
        Schema::dropIfExists('impactfactory_medicalconditions_treatments');
        Schema::dropIfExists('impactfactory_medicalconditions_treatment_condition');
    }
}
