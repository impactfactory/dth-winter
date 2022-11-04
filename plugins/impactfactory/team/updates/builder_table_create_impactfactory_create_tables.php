<?php namespace ImpactFactory\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateImpactFactoryTeamOrganisations extends Migration
{
    public function up()
    {

        Schema::create('impactfactory_team_organisations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->text('desc')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('img')->nullable();
            $table->boolean('is_published')->default(1);
            $table->text('type')->nullable();
            $table->text('schema_type')->nullable();
            $table->text('schema_name')->nullable();
            $table->text('schema_id')->nullable();
            $table->text('schema_desc')->nullable();
            $table->text('schema_logo')->nullable();
            $table->text('schema_photo')->nullable();
            $table->text('schema_img')->nullable();
            $table->text('schema_url')->nullable();
            $table->text('schema_phone')->nullable();
            $table->text('schema_speciality')->nullable();
            $table->text('schema_founder_name')->nullable();
            $table->text('schema_founder_jobtitle')->nullable();
            $table->text('schema_founder_url')->nullable();
            $table->text('schema_foundingdate')->nullable();
            $table->text('schema_region')->nullable();
            $table->text('schema_zip')->nullable();
            $table->text('schema_country')->nullable();
            $table->text('schema_latitude')->nullable();
            $table->text('schema_longitude')->nullable();
            $table->text('schema_map_url')->nullable();
            $table->text('schema_openingdays')->nullable();
            $table->text('schema_opens')->nullable();
            $table->text('schema_closes')->nullable();
            $table->text('schema_service')->nullable();
            $table->text('schema_author_name')->nullable();
            $table->text('schema_author_url')->nullable();
            $table->text('schema_city')->nullable();
            $table->text('schema_site_name')->nullable();
            $table->text('schema_copyright')->nullable();
            $table->text('schema_street')->nullable();
            $table->text('schema_no')->nullable();
            $table->text('socials')->nullable();
            $table->string('url', 255)->nullable();
        });

        Schema::create('impactfactory_team_teams', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('label', 255)->nullable();
            $table->integer('organisation_id')->nullable();
            $table->string('style')->default('default');
            $table->boolean('is_published')->nullable();
        });

        Schema::create('impactfactory_team_people', function($table)
        {
            $table->engine = 'InnoDB';
            $table->boolean('booking')->default(0);
            $table->text('boxtext')->nullable();
            $table->text('boxfeature')->nullable();
            $table->string('boxlink')->nullable();
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->boolean('is_published')->default(1);
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('role')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->nullable();
            $table->text('milestones')->nullable();
            $table->text('background')->nullable();
            $table->string('availability')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('skills')->nullable();
            $table->text('jobs')->nullable();
            $table->text('educations')->nullable();
            $table->text('company')->nullable();
            $table->text('slug');
            $table->text('street')->nullable();
            $table->text('no')->nullable();
            $table->text('zip')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('map_title')->nullable();
            $table->text('map_intro')->nullable();
            $table->text('tabs_title')->nullable();
            $table->string('map_published', 255)->nullable();
            $table->text('testimonials')->nullable();
            $table->text('testimonials_title')->nullable();
            $table->text('portrait')->nullable();
            $table->boolean('show_detail')->default(1);
            $table->text('seo_desc')->nullable();
            $table->text('socials')->nullable();
            $table->integer('sort_order')->nullable();
            $table->text('honorific')->nullable();
            $table->text('imgbox')->nullable();
            $table->text('imglist')->nullable();
            $table->text('memberships')->nullable();
            $table->text('publications')->nullable();
            $table->text('publications_text')->nullable();
        });

        Schema::create('impactfactory_team_person_team', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('team_id');
            $table->primary(['person_id','team_id']);
        });


    }

    public function down()
    {
        Schema::dropIfExists('impactfactory_team_organisations');
        Schema::dropIfExists('impactfactory_team_teams');
        Schema::dropIfExists('impactfactory_team_people');
        Schema::dropIfExists('impactfactory_team_person_team');
    }
}
