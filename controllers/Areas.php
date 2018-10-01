<?php namespace JanVince\SmallRecords\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Flash;
use Lang;
use JanVince\SmallRecords\Models\Record;
use JanVince\SmallRecords\Models\Settings;

class Areas extends Controller
{
    public $implement = [
    'Backend\Behaviors\ListController',
    'Backend\Behaviors\FormController',
    'Backend.Behaviors.ImportExportController',
    ];

    public $listConfig = [
        'default' => 'config_list.yaml'
    ];

    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = ['janvince.smallrecords.access_areas'];

    public $importExportConfig = 'config_import_export.yaml';

    public function __construct() {
        parent::__construct();

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', 'areas');
    }

}
