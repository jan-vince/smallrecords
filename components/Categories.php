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

class Categories extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.components.categories.name',
            'description' => 'janvince.smallrecords::lang.components.categories.description',
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
            'rootOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.root_categories_only',
                'description' => 'janvince.smallrecords::lang.components.common.properties.root_categories_only_description',
                'type'        => 'checkbox',
                'default'     => false,
            ],

            'parentCategorySlug'  => [
                'title'         => 'janvince.smallrecords::lang.components.common.properties.parent_category_slug',
                'description'   => 'janvince.smallrecords::lang.components.common.properties.parent_category_slug_description',
                'type'          => 'dropdown',
                'default'       => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_category',
            ],

            'areaSlug'  => [
                'title'         => 'janvince.smallrecords::lang.components.common.properties.area_slug',
                'description'   => 'janvince.smallrecords::lang.components.common.properties.area_slug_description',
                'type'          => 'dropdown',
                'default'       => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],
            'activeRecordsOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.active_records_only',
                'description' => 'janvince.smallrecords::lang.components.common.properties.active_records_only_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],
            'useMainCategory'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.use_main_category',
                'description' => 'janvince.smallrecords::lang.components.common.properties.use_main_category_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],
            'useMultiCategories'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.use_multicategories',
                'description' => 'janvince.smallrecords::lang.components.common.properties.use_multicategories_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],

            'categoriesPage' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.categories_page',
                'description' => 'janvince.smallrecords::lang.components.common.properties.categories_page_description',
                'type'        => 'dropdown',
                'default'     => 'records',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'categoriesPageSlug' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.categories_page_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.categories_page_slug_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'categoryPage' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.category_page',
                'description' => 'janvince.smallrecords::lang.components.common.properties.category_page_description',
                'type'        => 'dropdown',
                'default'     => 'category',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'categoryPageSlug' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.category_page_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.category_page_slug_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.links',
            ],

            'allowLimit'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.allow_limit',
                'description' => 'janvince.smallrecords::lang.components.common.properties.allow_limit_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.limit',
            ],
            'limit'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.limit',
                'description' => 'janvince.smallrecords::lang.components.common.properties.limit_description',
                'type'        => 'string',
                'default'     => 10,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.limit',
            ],
        ];

    }

    public function getAreaSlugOptions() {

        $areas = [];

        $areas = Area::isActive()->orderBy('name')->lists('name', 'slug');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.common.forms.empty_option')) ];

        return $emptyOption + $areas;
    }

    public function getParentCategorySlugOptions() {

        $categories = [];

        $categories = Category::whereNull('parent_id')->orderBy('name')->lists('name', 'slug');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.common.forms.empty_option')) ];

        return $emptyOption + $categories;
    }

    public function getCategoriesPageOptions(){

        $pages = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.common.forms.empty_option')) ];

        return $emptyOption + $pages;
    }

    public function getCategoryPageOptions(){

        return $this->getCategoriesPageOptions();
    }

    public function onRun()
    {

        /**
         *  Pass variables to templates
         */
        $this->page['categoryPage'] = $this->property('categoryPage');
        $this->page['categoryPageSlug'] = $this->paramName('categoryPageSlug');
        $this->page['categoriesPage'] = $this->property('categoriesPage');
        $this->page['categoriesPageSlug'] = $this->paramName('categoriesPageSlug');
    }

    public function onRender()
    {

        /**
         *  Allow some varibles from component
         */
        $this->page['cssClass'] = $this->property('cssClass');
    }

    /**
     * Get categories
     * return @array
     */
    public function items() {

        $categories = Category::query();

        /**
         *  Get only categories with one or more "main category" records
         */
        
        $categories->with(['records' => function($query) {
            
            if( $this->property('areaSlug') ) {
                
                $query->whereHas('area', function ($query2) {
                    
                    $query2->where('slug', '=', $this->property('areaSlug'));    
                });
            }    
            
            if( $this->property('activeRecordsOnly') ) {
                
                $query->where('active', '=', true);    
            }    
        }]);
        
        if( $this->property('useMainCategory') ) {

            $categories->whereHas('records', function ($query) {
            
                if( $this->property('areaSlug') ) {
       
                    $query->whereHas('area', function ($query2) {

                        $query2->where('slug', '=', $this->property('areaSlug'));    
                    });
                }    

                if( $this->property('activeRecordsOnly') ) {

                    $query->where('active', '=', true);    
                }    
            });
        }

        /**
         *  Get only categories with one or more "secondary categories" records
         */
        
        $categories->with(['records_multicategories' => function($query) {
            
            if( $this->property('areaSlug') ) {
                
                $query->whereHas('area', function ($query2) {
                    
                    $query2->where('slug', '=', $this->property('areaSlug'));    
                });
            }    
            
            if( $this->property('activeRecordsOnly') ) {
                
                $query->where('active', '=', true);    
            }    
        }]);
        
        if( $this->property('useMultiCategories') ) {
            
            $categories->whereHas('records_multicategories', function ($query) {
            
                if( $this->property('areaSlug') ) {
       
                    $query->whereHas('area', function ($query2) {

                        $query2->where('slug', '=', $this->property('areaSlug'));    
                    });
                }    

                if( $this->property('activeRecordsOnly') ) {

                    $query->where('active', '=', true);    
                }    
            });
        }

        /**
         *  Filter only children of parent category
         */
         if( $this->property('parentCategorySlug') ) {
             
            $parentCategory = Category::where('slug', $this->property('parentCategorySlug'))->first();

             if($parentCategory) {
                 $categories->where('parent_id', $parentCategory->id);
             }
         }

        /**
         *  Filter root only
         */
         if( $this->property('rootOnly') ) {
             $categories->whereNull('parent_id');
         }

        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') ) {
             $categories->isActive();
         }

        /**
         *  Limit
         */
        if( $this->property('allowLimit') and  $this->property('limit') ) {
            $categories->limit($this->property('limit'));
        }

        $categories = $categories->get();

        return $categories;

    }

}
