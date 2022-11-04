<?php namespace Impactfactory\MedicalConditions\Models;

use Model;
use ImpactFactory\Blog\Models\Tag;
use \October\Rain\Database\Traits\Validation;


class Test extends Model
{

  public $implement = [
      'RainLab.Translate.Behaviors.TranslatableModel'
  ];

  public $translatable = ['name', 'url'];

  public $table = 'impactfactory_medicalconditions_tests';

  public $rules = [
    ];

  public $belongsTo = [
      'tag' => [
          Tag::class
        ]
      ];
}
