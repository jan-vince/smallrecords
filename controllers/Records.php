<?php namespace JanVince\SmallRecords\Controllers;

use Backend\Classes\Controller;
use System\Classes\PluginManager;
use BackendMenu;
use Flash;
use Lang;
use JanVince\SmallRecords\Models\Record;
use JanVince\SmallRecords\Models\Settings;
use JanVince\SmallRecords\Models\Area;
use Redirect;
use Backend;
use Request;

class Records extends Controller
{

    protected $area_id;
    protected $areaName;
    protected $area;

    public $implement = [
    'Backend\Behaviors\ListController',
    'Backend\Behaviors\FormController',
    'Backend.Behaviors.RelationController',
    'Backend.Behaviors.ReorderController',
    ];

    public $listConfig = [
        'default' => 'config_list.yaml'
    ];

    public $reorderConfig = 'config_reorder.yaml';

    public $formConfig = 'config_form.yaml';

    public $relationConfig = 'config_relation.yaml';

    public $nextRecord;
    public $previousRecord;

    public function __construct() {

        parent::__construct();

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', 'records' );

    }

    public function create_onSaveNew($context = null)
    {
        parent::create_onSave($context);

        return Backend::url('janvince/smallrecords/records/create', ['area_id' => $this->area_id]);

    }

    public function update_onSaveNew($context = null)
    {
        parent::update_onSave($context);

        return Backend::url('janvince/smallrecords/records/create', ['area_id' => $this->area_id]);

    }

    public function index($area_id) {

        if ( !$this->user->hasAccess([('janvince.smallrecords.access_area_'.$area_id)]) ) {
            \Flash::error( e(trans('janvince.smallrecords::lang.permissions.access_denied')) );
            return Redirect::to(Backend::url('/'));
        }

        $this->area_id = $area_id;

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', ('rec' . $this->area_id) );

        $area = Area::find($area_id);
        if ($area) {
            $this->areaName = $area->name;
            $this->pageTitle = $area->name;
        }

        $this->asExtension('ListController')->index();

    }

    public function create($area_id) {

        parent::create($area_id);

        if ( !$this->user->hasAccess([('janvince.smallrecords.access_area_'.$area_id)]) ) {
            \Flash::error( e(trans('janvince.smallrecords::lang.permissions.access_denied')) );
            return Redirect::to(Backend::url('/'));
        }

        $this->area_id = $area_id;

        $area = Area::find($area_id);
        if ($area) {
            $this->areaName = $area->name;
        }

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', ('rec' . $area_id) );

    }

    public function reorder($area_id) {

        parent::reorder($area_id);

        if ( !$this->user->hasAccess([('janvince.smallrecords.access_area_'.$area_id)]) ) {
            \Flash::error( e(trans('janvince.smallrecords::lang.permissions.access_denied')) );
            return Redirect::to(Backend::url('/'));
        }

        $this->area_id = $area_id;

        $area = Area::find($area_id);
        if ($area) {
            $this->areaName = $area->name;
        }

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', ('rec' . $area_id) );

    }

    public function update($id, $area_id) {

        parent::update($id, $area_id);

        if ( !$this->user->hasAccess([('janvince.smallrecords.access_area_'.$area_id)]) ) {
            \Flash::error( e(trans('janvince.smallrecords::lang.permissions.access_denied')) );
            return Redirect::to(Backend::url('/'));
        }

        $this->area_id = $area_id;

        BackendMenu::setContext('JanVince.SmallRecords', 'smallrecords', ('rec' . $area_id) );

        $area = Area::find($area_id);
        if ($area) {
            $this->areaName = $area->name;
            $this->area = $area;
        }

        $record = Record::find($id);

        if($record ) {
            $this->vars['record'] = $record;
        }

    }

    public function onDeleteAttachedImages($recordId, $context = ''){

        $record = Record::where('id', $recordId)->first();

        return $record->deleteAttachedImages();

    }

    public function getRecord($recordId) {

        return Record::where('id', $recordId)->first();

    }

    public function listExtendQuery($query)
    {

        // Filter by area
        if ($this->area_id) {
            $query->where('area_id', $this->area_id);
        }

    }

    public function getRecordsStats($part){

        switch($part){

            case 'records_count':
                return Record::where('area_id', $this->area_id)->count();
            break;

            case 'records_active':
                return Record::where('area_id', $this->area_id)->where('active', 1)->count();
            break;

            case 'records_hidden':
                return Record::where('area_id', $this->area_id)->where('active', 0)->count();
            break;

            case 'records_favourite':
                return Record::where('area_id', $this->area_id)->where('favourite', 1)->count();
            break;

            case 'records_common':
                return Record::where('area_id', $this->area_id)->where('favourite', 0)->count();
            break;

            case 'latest_records_name':
                return \Db::table('janvince_smallrecords_records')
                        ->where('area_id', $this->area_id)
                        ->orderBy('date', 'desc')
                        ->value('name');
            break;

            case 'latest_records_date':
                $date = new \DateTime(\Db::table('janvince_smallrecords_records')
                    ->where('area_id', $this->area_id)
                    ->orderBy('date', 'desc')
                    ->value('date'));
                return is_object($date) ? $date->format('j.n.Y') : $date;
            break;

            case 'active_area_name':
                $area = Area::find($this->area_id);
                if($area) {
                    return $area->name;
                }
            break;

            default:
                return NULL;
                break;

        }

    }

    public function reorderExtendQuery($query) {
        
        $segments = Request::segments(); 
        
        $area_id = end($segments);

        if( !empty($area_id) ) {
            $query->where('area_id', $area_id);
        } 
    }

    public function formExtendFields($form){

        $params = $this->params;

        if(empty($params[1])) {
            return;
        }

        $areaId = $params[1];
        $area = Area::find($areaId);

        if(empty($area->custom_repeater_fields)) {
            return;
        }

        $fields = [];
        $counter = 0;

        foreach($area->custom_repeater_fields as $field) {
            
            if(empty($field['custom_repeater_field_name'])) {
                $fieldName = 'field' . $counter;
            } else {
                $fieldName = $field['custom_repeater_field_name'];
            }

            $fields[$fieldName] = [
                'type' => $field['custom_repeater_field_type'],
                'label' => $field['custom_repeater_field_label'],
                'span' => $field['custom_repeater_field_span'],
            ];

            if(!empty($field['custom_repeater_field_mode'])) {
                $fields[$fieldName]['mode'] = $field['custom_repeater_field_mode'];
            }

            if(!empty($field['custom_repeater_field_size'])) {
                $fields[$fieldName]['size'] = $field['custom_repeater_field_size'];
            }
        }

        /*
         * Check the Rainlab.Translate plugin is installed
         */
        $repeaterType = 'repeater';

        $pluginManager = PluginManager::instance()->findByIdentifier('Rainlab.Translate');

        if ($pluginManager && !$pluginManager->disabled) {
          $repeaterType = 'mlrepeater';
        }

        $form->addTabFields([
            'custom_repeater' => [
                'type' => $repeaterType,
                'prompt' => ($area->custom_repeater_prompt ? $area->custom_repeater_prompt : '+'),
                'minItems' => ($area->custom_repeater_min_items ? $area->custom_repeater_min_items : 1),
                'maxItems' => ($area->custom_repeater_max_items ? $area->custom_repeater_max_items : false),
                'tab' => ($area->custom_repeater_tab_title ? $area->custom_repeater_tab_title : 'Data'),
                'form' => [
                    'fields' => $fields,
                ]
            ],
        ]);
    }
}
