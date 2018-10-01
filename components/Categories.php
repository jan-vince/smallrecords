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
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.active_only',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.active_only_description',
                'type'        => 'checkbox',
                'default'     => true,
            ],
            'rootOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.root_only',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.root_only_description',
                'type'        => 'checkbox',
                'default'     => false,
            ],
            'parentCategorySlug'  => [
                'title'         => 'janvince.smallrecords::lang.components.categories.properties.parent_category_slug',
                'description'   => 'janvince.smallrecords::lang.components.categories.properties.parent_category_slug_description',
                'type'          => 'dropdown',
                'default'       => false,
            ],

            'areaSlug'  => [
                'title'         => 'janvince.smallrecords::lang.components.categories.properties.area',
                'description'   => 'janvince.smallrecords::lang.components.categories.properties.area_description',
                'type'          => 'dropdown',
                'default'       => false,
                'group'         => 'janvince.smallrecords::lang.components.categories.properties.groups.with_records',
            ],
            'useMainCategory'      => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.use_main_category',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.use_main_category_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.categories.properties.groups.with_records',
            ],
            'useMultiCategories'      => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.use_multicategories',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.use_multicategories_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.categories.properties.groups.with_records',
            ],

            'categorySlug'    => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.category_slug',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.category_slug_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
                'group'         => 'janvince.smallrecords::lang.components.categories.properties.groups.links',
            ],
            'categoryPage' => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.category_page',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.category_page_description',
                'type'        => 'dropdown',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.categories.properties.groups.links',
            ],

            'allowLimit'   => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.allow_limit',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.allow_limit_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.categories.properties.groups.limit',
            ],
            'limit'   => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.limit',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.limit_description',
                'type'        => 'string',
                'default'     => 10,
                'group'       => 'janvince.smallrecords::lang.components.categories.properties.groups.limit',
            ],
        ];

    }

    public function getAreaSlugOptions() {

        $areas = [];

        $areas = Area::isActive()->orderBy('name')->lists('name', 'slug');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.categories.properties.empty_option')) ];

        return $emptyOption + $areas;

    }

    // TODO: Get all parents not only root ones
    public function getParentcategorySlugOptions() {

        $categories = [];

        $categories = Category::whereNull('parent_id')->orderBy('name')->lists('name', 'slug');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.categories.properties.empty_option')) ];

        return $emptyOption + $categories;

    }

    public function getCategoryPageOptions(){

        $pages = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.categories.properties.empty_option')) ];

        return $emptyOption + $pages;

    }

    public function getDetailPageSlugOptions(){

        $pages = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.categories.properties.empty_option')) ];

        return $emptyOption + $pages;
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
        if( $this->property('useMainCategory') ) {

            $categories->with('records');

            if( $this->property('areaSlug') ) {

                $categories->whereHas('records', function ($query) {

                    $query->whereHas('area', function ($query2) {
    
                        $query2->where('slug', '=', $this->property('areaSlug'));
    
                    });
                });
            }
        }

        /**
         *  Get only categories with one or more "secondary categories" records
         */
        if( $this->property('useMultiCategories') ) {
            
            $categories->with('records_multicategories');

            if( $this->property('areaSlug') ) {

                $categories->whereHas('records_multicategories', function ($query) {

                    $query->whereHas('area', function ($query2) {

                        $query2->where('slug', '=', $this->property('areaSlug'));

                    });
                });
            }
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
