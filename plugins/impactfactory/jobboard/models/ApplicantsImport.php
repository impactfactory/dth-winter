<?php

namespace Impactfactory\Jobboard\Models;

//use Model;
//use Backend\Models\ImportModel;
use Impactfactory\Jobboard\Models\Applicants;


class ApplicantsImport extends \Backend\Models\ImportModel

{
    public $rules = [];

    public function importData($results, $sessionKey = null)
    {
      foreach ($results as $row => $data) {

          try {
              $applicant = new Applicants;
              $applicant->fill($data);
              $applicant->save();

              $this->logCreated();
          }
          catch (\Exception $ex) {
              $this->logError($row, $ex->getMessage());
          }

      }
    }


}
