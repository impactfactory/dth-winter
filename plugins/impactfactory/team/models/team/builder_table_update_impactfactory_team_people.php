<?php namespace ImpactFactory\Team\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateImpactfactoryTeamPeople extends Migration
{
    public function up()
    {
        Schema::table('impactfactory_team_people', function($table)
        {
            $table->text('milestones')->nullable();
        });
    }

    public function down()
    {
        Schema::table('impactfactory_team_people', function($table)
        {
            $table->dropColumn('milestones');
        });
    }
}
