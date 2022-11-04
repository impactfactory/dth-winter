<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use System\Models\File;
use October\Rain\Database\Traits\Sortable;
use RainLab\Translate\Behaviors\TranslatableModel;
use \October\Rain\Database\Traits\Validation;


class MedicalCondition extends Model
{

    public $table = 'impactfactory_medicalconditions_';

    public $rules = [
    ];

    public $implement = [
        TranslatableModel::class
    ];

    public $translatable = [
        'alt_names',
        'anatomy',
        'codesystem',
        'codevalue',
        'desc',
        'differential',
        'distinguishing_signs',
        'g_desc',
        'g_ev',
        'g_name',
        'g_origin',
        'g_recomm',
        'how_desc',
        'how_name',
        'how_supplyname',
        'how_toolname',
        'how_totalcost',
        'how_totaltime',
        'name',
        'speciality',
        'wiki'
    ];

    protected $jsonable = [
          'alt_names',
          'distinguishing_signs',
          'how_supplyname',
          'how_toolname'
    ];

    public $belongsToMany = [
        'books' => [Book::class, 'table' => 'impactfactory_medicalconditions_book_condition'],
        'faqs' => [FAQ::class, 'table' => 'impactfactory_medicalconditions_faq_condition'],
        'links' => [Link::class, 'table' => 'impactfactory_medicalconditions_link_condition'],
        'risks' => [Risk::class, 'table' => 'impactfactory_medicalconditions_risk_condition'],
        'steps' => [Step::class, 'table' => 'impactfactory_medicalconditions_step_condition'],
        'symptoms' => [Symptom::class, 'table' => 'impactfactory_medicalconditions_symptom_condition'],
        'tests' => [Test::class, 'table' => 'impactfactory_medicalconditions_test_condition'],
        'treatments' => [Treatment::class, 'table' => 'impactfactory_medicalconditions_treatment_condition'],
    ];
}
