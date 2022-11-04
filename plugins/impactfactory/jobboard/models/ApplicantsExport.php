<?php

namespace Impactfactory\Jobboard\Models;

use Model;
use Backend\Models\ExportModel;
use Impactfactory\Jobboard\Models\Applicants;



class ApplicantsExport extends \Backend\Models\ExportModel

{
    public function exportData($columns, $sessionKey = null)
    {
      $applicants = Applicants::all();
      $applicants->each(function($applicant) use ($columns) {
          $applicant->addVisible($columns);
      });
      return $applicants->toArray();

    }


}
