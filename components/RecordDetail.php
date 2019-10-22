<?php

namespace JanVince\SmallRecords\Components;

use Db;
use Log;
use Carbon\Carbon;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use System\Classes\PluginManager;
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
                'title'       => 'janvince.smallrecords::lang.components.common.properties.active_only',
                'description' => 'janvince.smallrecords::lang.components.common.properties.active_only_description',
                'type'        => 'checkbox',
                'default'     => true,
            ],

            'recordSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.record_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.record_slug_description',
                'type'        => 'string',
                'default'     => '{{ :record }}',
            ],

            'areaSlug'  => [
                'title' => 'janvince.smallrecords::lang.components.common.properties.area_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.area_slug_description',
                'type'  => 'dropdown',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],

            'categorySlug'    => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.category_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.category_slug_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_category',
            ],
            'useMainCategory'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.use_main_category',
                'description' => 'janvince.smallrecords::lang.components.common.properties.use_main_category_description',
                'type'        => 'checkbox',
                'default'     => true,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_category',
            ],
            'useMultiCategories'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.use_multicategories',
                'description' => 'janvince.smallrecords::lang.components.common.properties.use_multicategories_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_category',
            ],

            'setPageMeta'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.set_page_meta',
                'description' => 'janvince.smallrecords::lang.components.common.properties.set_page_meta_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.seo',
            ],
            'throw404'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.throw404',
                'description' => 'janvince.smallrecords::lang.components.common.properties.throw404_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.seo',
            ],

            'categoryPage'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.category_page',
                'description' => 'janvince.smallrecords::lang.components.common.properties.category_page_description',
                'type'        => 'dropdown',
                'default'     => 'category',
                'group'       => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'categoryPageSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.category_page_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.category_page_slug_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
                'group'       => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
        ];

    }

    public function getAreaSlugOptions() {

        $areas = [];

        $areas = Area::isActive()->orderBy('name')->lists('name', 'slug');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.common.forms.empty_option')) ];

        return $emptyOption + $areas;
    }

    public function getCategoryPageOptions() {

        $pages = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.common.forms.empty_option')) ];

        return $emptyOption + $pages;
    }

    public function onRun()
    {

        $this->recordDetail = $this->page['recordDetail'] = $this->getRecord();

        if( $this->property('recordSlug') and !$this->recordDetail ){
            $this->setStatusCode(404);
            return $this->controller->run('404');
        }

        if( $this->property('setPageMeta') and $this->recordDetail ){
            $this->page->meta_title = $this->page->title = strip_tags($this->recordDetail->name);
            $this->page->meta_description = strip_tags($this->recordDetail->description);
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

        if (empty($this->property('recordSlug'))) {
            return null;
        }

        $pluginManager = PluginManager::instance()->findByIdentifier('Rainlab.Translate');
        
        $record = Record::query();

        /**
         *  Filter slug
         */
        if ($pluginManager && !$pluginManager->disabled) {
            $record->transWhere('slug', $this->property('recordSlug'));
        } else {
            $record->where('slug', $this->property('recordSlug'));
        }

        /**
         *  Filter area
         */
        if( $this->property('areaSlug') ) {
         
            $record->whereHas('area', function ($query) {

                $query->where('slug', '=', $this->property('areaSlug'));
            });
        }

        /**
         *  Filter category
         */
        if( $this->property('categorySlug') ) {

            if( $this->property('useMainCategory') ) {

                $record->whereHas('category', function ($query) use ($pluginManager) {

                    if ($pluginManager && !$pluginManager->disabled) {
                        $query->transWhere('slug', $this->property('categorySlug'));
                    } else {
                        $query->where('slug', '=', $this->property('categorySlug'));
                    }
                });
            }

            if( $this->property('useMultiCategories') ) {

                $record->whereHas('categories', function ($query) use ($pluginManager) {

                    if ($pluginManager && !$pluginManager->disabled) {
                        $query->transWhere('slug', $this->property('categorySlug'));
                    } else {
                        $query->where('slug', '=', $this->property('categorySlug'));
                    }
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
