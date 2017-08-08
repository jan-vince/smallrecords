<?php

namespace JanVince\SmallRecords\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use JanVince\SmallRecords\Models\Category;
use Flash;

class Attributes extends Controller
{
    public $implement = [
		'Backend\Behaviors\ListController',
    	'Backend\Behaviors\FormController',
    	// 'Backend.Behaviors.RelationController',
		];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    // public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = ['janvince.smallrecords.access_attributes'];

    public function __construct() {
        parent::__construct();

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', 'attributes');
    }

}
