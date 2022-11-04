<?php namespace ImpactFactory\Team\Models;

use Model;
use October\Rain\Database\Traits\SimpleTree;
use October\Rain\Database\Traits\Sortable;
use RainLab\Translate\Behaviors\TranslatableModel;

/**
 * Model
 */
class Team extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Sortable;

    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = [
        'label'
    ];

    /*
     * Validation
     */
    public $rules = [
        'label' => 'required',
        'organisation' => 'required'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'impactfactory_team_teams';

    public $belongsToMany = [
        'people' => [Person::class, 'table' => 'impactfactory_team_person_team']
    ];
    public $belongsTo = [
        'organisation' => [Organisation::class]
    ];
}
