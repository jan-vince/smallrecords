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
            'areaSlug'  => [
                'title' => 'janvince.smallrecords::lang.components.categories.properties.area',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.area_description',
                'type'  => 'dropdown',
                'default' => null,
            ],
            'categorySlug'    => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.category',
                'description' => 'janvince.smallrecords::lang.components.records.properties.category_description',
                'type'        => 'string',
                'default'     => '{{ :category }}',
            ],
            'activeOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.active_only',
                'description' => 'janvince.smallrecords::lang.components.records.properties.active_only_description',
                'type'        => 'checkbox',
                'default'     => true,
            ],
            'rootOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.root_only',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.root_only_description',
                'type'        => 'checkbox',
                'default'     => false,
            ],
            'useMultiCategories'      => [
                'title'       => 'janvince.smallrecords::lang.components.categories.properties.use_multicategories',
                'description' => 'janvince.smallrecords::lang.components.categories.properties.use_multicategories_description',
                'type'        => 'checkbox',
                'default'     => false,
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

        $areas = Area::isActive()->orderBy('name')->lists('name', 'slug');;

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.categories.properties.area_id_empty_option')) ];

        return $emptyOption + $areas;

    }

    public function getDetailPageSlugOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
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

        if( $this->property('useMultiCategories') ) {
            $categories = Category::with('records_multicategories');
        } else {
            $categories = Category::with('records');
        }

        /**
         *  Filter category records by area
         */
        if( $this->property('areaSlug') ) {


            if( $this->property('useMultiCategories') ) {

                $categories->whereHas('records_multicategories', function ($query2) {

                        $query2->whereHas('area', function ($query3) {
    
                            $query3->where('slug', '=', $this->property('areaSlug'));
        
                        });
                });

            } else {

                $categories->whereHas('records', function ($query) {

                    $query->whereHas('area', function ($query2) {
    
                        $query2->where('slug', '=', $this->property('areaSlug'));
    
                    });
                });
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
