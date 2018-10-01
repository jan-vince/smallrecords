<?php

namespace JanVince\SmallRecords\Components;

use Db;
use Carbon\Carbon;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use JanVince\SmallRecords\Models\Category;
use JanVince\SmallRecords\Models\Record;
use JanVince\SmallRecords\Models\Settings;
use JanVince\SmallRecords\Models\Area;

class RecordDetail extends ComponentBase
{


    /**
    * Selected record
     * @var JanVince\SmallRecords\Models\Record
     */
    public $recordDetail;


    public function componentDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.components.record.name',
            'description' => 'janvince.smallrecords::lang.components.record.description',
        ];
    }

    public function defineProperties()
    {

        return [
            'activeOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.active_only',
                'description' => 'janvince.smallrecords::lang.components.records.properties.active_only_description',
                'type'        => 'checkbox',
                'default'     => true,
            ],

            'recordSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.record.properties.record_slug',
                'description' => 'janvince.smallrecords::lang.components.record.properties.record_slug_description',
                'type'        => 'string',
                'default'     => '{{ :slug }}',
            ],
            'areaSlug'  => [
                'title' => 'janvince.smallrecords::lang.components.records.properties.area',
                'type'  => 'dropdown',
            ],

            'categorySlug'    => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.category',
                'description' => 'janvince.smallrecords::lang.components.records.properties.category_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
                'group'         => 'janvince.smallrecords::lang.components.records.properties.groups.with_categories',
            ],
            'useMainCategory'      => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.use_main_category',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.use_main_category_description',
                'type'        => 'checkbox',
                'default'     => true,
                'group'         => 'janvince.smallrecords::lang.components.records.properties.groups.with_categories',
            ],
            'useMultiCategories'      => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.use_multicategories',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.use_multicategories_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.records.properties.groups.with_categories',
            ],

            'throw404'   => [
                'title'       => 'janvince.smallrecords::lang.components.record.properties.throw404',
                'description' => 'janvince.smallrecords::lang.components.record.properties.throw404_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.records.properties.groups.links',
            ],
        ];

    }

    public function getAreaSlugOptions() {

        $areas = [];

        $areas = Area::isActive()->orderBy('name')->lists('name', 'slug');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.records.properties.empty_option')) ];

        return $emptyOption + $areas;
    }

    public function onRun()
    {

        $this->recordDetail = $this->page['recordDetail'] = $this->getRecord();

        if( $this->property('recordSlug') and !$this->recordDetail ){
            abort(404, 'Record not found!');
        }

    }

    public function onRender()
    {

        /**
         *  Allow some varibles from component
         */
        $this->page['cssClass'] = $this->property('cssClass');

    }

    /**
     * Get record with filters from properties
     * return @array
     */
    private function getRecord() {

        $record = Record::query();

        /**
         *  Filter area
         */
        if( $this->property('areaSlug') ) {
         
            $record->whereHas('area', function ($query) {

                $query->where('slug', '=', $this->property('areaSlug'));
            });
        }

        /**
         *  Filter slug
         */
        $record = Record::where('slug', $this->property('recordSlug'));

        /**
         *  Filter category
         */
        if( $this->property('categorySlug') ) {

            if( $this->property('useMainCategory') ) {

                $record->whereHas('category', function ($query) {

                    $query->where('slug', '=', $this->property('categorySlug'));
                });
            }

            if( $this->property('useMultiCategories') ) {

                $record->whereHas('categories', function ($query) {

                    $query->where('slug', '=', $this->property('categorySlug'));
                });
            } 
        }

        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') ) {
             $record->isActive();
         }

        $recordDetail = $record->first();

        return $recordDetail;
    }

    /**
     * Get area custom repeater field value
     * return @array
     */
    public function getCustomRepeaterField($fieldName, $fieldKey = null) {

        $record = Record::where('slug', $this->property('recordSlug'))->first();

        if(empty($record->area->custom_repeater_fields)) {
            return;
        }

        $customFields = $record->area->custom_repeater_fields;

        foreach($customFields as $field) {
            
            if($field['custom_repeater_field_name'] == $fieldName) {
                
                if($fieldKey and !empty($field[$fieldKey])) {
                    return $field[$fieldKey];
                } else {
                    return $field;
                }
            }
        }
    }
}
