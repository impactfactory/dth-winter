<?php namespace ImpactFactory\Jobboard\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;
use Flash;
use System\Models\File;
use RainLab\Translate\Models\Message;
use ImpactFactory\Jobboard\Models\Applicants as ApplicantsModel;

class ApplicationForm extends ComponentBase
{
    //public $applicant;
    //public $firstname;

    public function componentDetails()
    {
        return [
            'name' => 'Jobboard: Bewerbungs-Formular einfügen',
            'description' => 'Formular mit File-Upload, Datenspeicherung und automatischem Mail-Versand'
        ];
    }

    public function defineProperties()
    {
        return [
            'job' => [
                'label' => 'ausgeschriebene Stelle wählen',
                'type' => 'dropdown',
            ]
        ];
    }

    public function getJobOptions()
    {
          return [
            'administration' => 'Administration',
            'empfang' => 'Empfang',
          ];
    }


    public function onRun()
    {
       //$this->applicant = ApplicantsModel::all();
    }



    public function onSave(){

/*

      $applicant = new ApplicantsModel();
        $applicant->gender = Input::get('gender');
        $applicant->firstname = Input::get('firstname');
        $applicant->lastname = Input::get('lastname');
        $applicant->street_no = Input::get('street_no');
        $applicant->zip = Input::get('zip');
        $applicant->city = Input::get('city');
        $applicant->country = Input::get('country');
        $applicant->phone = Input::get('phone');
        $applicant->email = Input::get('email');
        $applicant->lang_de = Input::get('lang_de');
        $applicant->lang_en = Input::get('lang_en');
        $applicant->lang_fr = Input::get('lang_fr');
        $applicant->lang_it = Input::get('lang_it');
        $applicant->other_languages = Input::get('other_languages');
        $applicant->birthday = Input::get('birthday');
        $applicant->start_date = Input::get('start_date');
        $applicant->salary_min = Input::get('salary_min');
        $applicant->salary_max = Input::get('salary_max');
        $applicant->education = Input::get('education');
        $applicant->experience = Input::get('experience');
        $applicant->url = Input::get('url');
        $applicant->note = Input::get('note');
        $applicant->created_at = Input::get('created_at');
        $applicant->job_posting = Input::get('job_posting');
        $applicant->sort_order = Input::get('sort_order');

        $applicant->file_1 = Input::file('file_1');
        $applicant->file_2 = Input::file('file_2');
        $applicant->file_3 = Input::file('file_3');
        $applicant->file_4 = Input::file('file_4');
        $applicant->file_5 = Input::file('file_5');

      $validator = Validator::make(
          [
              'gender' => Input::get('gender'),
              'firstname' => Input::get('firstname'),
              'lastname' => Input::get('lastname'),
              'street_no' => Input::get('street_no'),
              'zip' => Input::get('zip'),
              'city' => Input::get('city'),
              'country' => Input::get('country'),
              'phone' => Input::get('phone'),
              'email' => Input::get('email'),
              'lang_de' => Input::get('lang_de'),
              'lang_en' => Input::get('lang_en'),
              'lang_fr' => Input::get('lang_fr'),
              'lang_it' => Input::get('lang_it'),
              'birthday' => Input::get('birthday'),
              'start_date' => Input::get('start_date'),
              'salary_min' => Input::get('salary_min'),
              'salary_max' => Input::get('salary_max'),
              'education' => Input::get('education'),
              'experience' => Input::get('experience')

          ],
          [
              'gender' => 'required',
              'firstname' => 'required',
              'lastname' => 'required',
              'street_no' => 'required',
              'zip' => 'required',
              'city' => 'required',
              'country' => 'required',
              'phone' => 'required',
              'email' => 'required|email',
              'lang_de' => 'required',
              'lang_it' => 'required',
              'lang_fr' => 'required',
              'lang_en' => 'required',
              'birthday' => 'required',
              'start_date' => 'required',
              'salary_min' => 'required',
              'salary_max' => 'required',
              'education' => 'required',
              'experience' => 'required',
          ],
          [
              'gender.required' => Message::trans('forms.messages.gender.required'),
              'firstname.required' => Message::trans('forms.messages.firstname.required'),
              'lastname.required' => Message::trans('forms.messages.lastname.required'),
              'street_no.required' => Message::trans('forms.messages.street_no.required'),
              'zip.required' => Message::trans('forms.messages.zip.required'),
              'city.required' => Message::trans('forms.messages.city.required'),
              'country.required' => Message::trans('forms.messages.country.required'),
              'phone.required' => Message::trans('forms.messages.phone.required'),
              'email.required' => Message::trans('forms.messages.email.required'),
              'email.email' => Message::trans('forms.messages.email.email'),
              'lang_de.required' => Message::trans('forms.messages.lang_de.required'),
              'lang_en.required' => Message::trans('forms.messages.lang_en.required'),
              'lang_it.required' => Message::trans('forms.messages.lang_it.required'),
              'lang_fr.required' => Message::trans('forms.messages.lang_fr.required'),
              'birthday.required' => Message::trans('forms.messages.birthday.required'),
              'start_date' => Message::trans('forms.messages.start_date.required'),
              'salary_min' => Message::trans('forms.messages.salary_min.required'),
              'salary_max' => Message::trans('forms.messages.salary_max.required'),
              'education' => Message::trans('forms.messages.education.required'),
              'experience' => Message::trans('forms.messages.experience.required')
          ]
      );

      if($validator->fails()){

          return Redirect::back()->withErrors($validator);

      } else {

        // Saving data in to databases

          $applicant->save();

    //Send Mails

        // values for mail
        $vars = [
          'gender' => Input::get('gender'),
          'firstname' => Input::get('firstname'),
          'lastname' => Input::get('lastname'),
          /*
          'organization' => Input::get('organization'),
          'email' => Input::get('email')
          
        ];

        // Mail for User
        Mail::send('if.forms::applicationform', $vars, function($message) {

              $message->to(Input::get('email'), Input::get('firstname')); // wie kriege ich hier firstname und lastname rein?
              $message->from(Message::trans('noreply.mail'), Message::trans('site.name'));

          });

        // Mail for staff
        Mail::send('if.forms::applicationform.data', $vars, function($message) {

                $message->to('tec@dth-herzzentrum.ch', '');
                //$message->bcc(dth-office@hin.ch, '');
                $message->from('dth-office@hin.ch', 'Diagnostisches und Therapeutisches Herzzentrum');

            });

    // Flashing messages

       Flash::success(Message::trans('forms.applicationform.flash.success'));

       return Redirect::to('danke');

      }

    */}




}
