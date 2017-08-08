<?php

namespace JanVince\SmallRecords\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use JanVince\SmallRecords\Models\Tag;
use Flash;

class Tags extends Controller
{
    public $implement = [
		'Backend\Behaviors\ListController',
    	'Backend\Behaviors\FormController',
		];

    public $listConfig = 'config_list.yaml';

    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = ['janvince.smallrecords.access_tags'];

    public function __construct() {
        parent::__construct();

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', 'tags');
    }

}
