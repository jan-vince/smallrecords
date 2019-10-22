<?php

namespace JanVince\SmallRecords\Components;

use Db;
use Carbon\Carbon;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use System\Classes\PluginManager;
use JanVince\SmallRecords\Models\Category;
use JanVince\SmallRecords\Models\Record;
use JanVince\SmallRecords\Models\Settings;
use JanVince\SmallRecords\Models\Area;

class CategoryDetail extends ComponentBase
{

    /**
    * Selected record
     * @var JanVince\SmallRecords\Models\Category
     */
    public $categoryDetail;

    public function componentDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.components.category.name',
            'description' => 'janvince.smallrecords::lang.components.category.description',
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

            'categorySlug'    => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.category_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.category_slug_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
            ],

            'areaSlug'  => [
                'title' => 'janvince.smallrecords::lang.components.common.properties.area_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.area_slug_description',
                'type'  => 'dropdown',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],
            'activeRecordsOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.active_records_only',
                'description' => 'janvince.smallrecords::lang.components.common.properties.active_records_only_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.filter_records',
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

            'recordPage'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.record_page',
                'description' => 'janvince.smallrecords::lang.components.common.properties.record_page_description',
                'type'        => 'dropdown',
                'default'     => 'record',
                'group'       => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'recordPageSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.record_page_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.record_page_slug_description',
                'type'        => 'string',
                'default'     => '{{ :record }}',
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

    public function getRecordPageOptions() {

        $pages = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.common.forms.empty_option')) ];

        return $emptyOption + $pages;
    }

    public function onRun()
    {

        $this->categoryDetail = $this->page['categoryDetail'] = $this->getCategory();

        if( $this->property('categorySlug') and !$this->categoryDetail ){
            abort(404, 'Record not found!');
        }

        if( $this->property('setPageMeta') and $this->categoryDetail ){
            $this->page->meta_title = $this->page->title = strip_tags($this->categoryDetail->name);
            $this->page->meta_description = strip_tags($this->categoryDetail->description);
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
     * Get category with filters from properties
     * return @array
     */
    private function getCategory() {

        if (empty($this->property('categorySlug'))) {
            return null;
        }

        $pluginManager = PluginManager::instance()->findByIdentifier('Rainlab.Translate');

        $category = Category::query();
        
        $category->with(['records' => function($query) {
            
            if( $this->property('areaSlug') ) {
                
                $query->whereHas('area', function ($query2) {
                    
                    $query2->where('slug', '=', $this->property('areaSlug'));    
                });
            }    
            
            if( $this->property('activeRecordsOnly') ) {
                
                $query->where('active', '=', true);    
            }    
        }]);

        $category->with(['records_multicategories' => function($query) use($pluginManager) {
            
            if( $this->property('areaSlug') ) {
                
                $query->whereHas('area', function ($query2) use($pluginManager) {
                    
                    if ($pluginManager && !$pluginManager->disabled) {
                        $query2->transWhere('slug', $this->property('areaSlug'));    
                    } else {
                        $query2->where('slug', '=', $this->property('areaSlug'));    
                    }
                });
            }    
            
            if( $this->property('activeRecordsOnly') ) {
                
                $query->where('active', '=', true);    
            }    
        }]);

        /**
         *  Filter slug
         */
        if ($pluginManager && !$pluginManager->disabled) {
            $category->transWhere('slug', $this->property('categorySlug'));
        } else {
            $category->where('slug', $this->property('categorySlug'));
        }

        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') ) {
             $category->isActive();
         }

        $categoryDetail = $category->first();

        return $categoryDetail;

    }

}
