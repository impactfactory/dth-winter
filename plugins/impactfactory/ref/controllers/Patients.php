<?php namespace ImpactFactory\Ref\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Renatio\DynamicPDF\Classes\PDFWrapper;
//use Renatio\DynamicPDF\Classes\PDF;
use ImpactFactory\Ref\Models\Patient;
use Str;

class Patients extends Controller
{
    public $implement = [
      'Backend\Behaviors\ListController',
      'Backend\Behaviors\FormController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ImpactFactory.Ref', 'main-menu-item', 'side-menu-item');
    }



/**** PDF Export ***/

public function onPDFCreate($id)
    {
        $paciente = Patient::find($id);
        if ($paciente === null) {
            throw new ApplicationException('Patient nicht gefunden');
        }


        $filename = Str::slug($paciente->lastname) . '-online-zuweisung.pdf';

        try {
            /** @var PDFWrapper $pdf */
            $pdf = app('dynamicpdf');

            $options = [
                'logOutputFile' => storage_path('temp/log-pdf.htm'),
            ];

            return $pdf
                ->loadTemplate('zuweisung', compact('paciente'))
                ->setOptions($options)
                //->download($filename);
                //->setWarnings($warnings)
                //->save($filename);
                ->stream($filename);

        } catch (Exception $e) {
            throw new ApplicationException($e->getMessage());
        }
    }

}
