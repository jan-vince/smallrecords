<?php namespace JanVince\SmallRecords\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use JanVince\SmallRecords\Models\Category;
use Flash;
use JanVince\SmallRecords\Models\Settings;

class Categories extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend.Behaviors.ReorderController'
        ];

    public $listConfig = 'config_list.yaml';

    public $formConfig = 'config_form.yaml';

    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = ['janvince.smallrecords.access_categories'];

    public function __construct() {
        parent::__construct();

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', 'categories');
    }

}
