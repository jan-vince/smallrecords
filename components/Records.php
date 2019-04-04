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

class Records extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.components.records.name',
            'description' => 'janvince.smallrecords::lang.components.records.description',
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
            'favouriteOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.favourite_only',
                'description' => 'janvince.smallrecords::lang.components.common.properties.favourite_only_description',
                'type'        => 'checkbox',
                'default'     => false,
            ],

            'areaSlug'  => [
                'title' => 'janvince.smallrecords::lang.components.common.properties.area_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.area_slug_description',
                'type'  => 'dropdown',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_area',
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
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_category',
            ],
            'useMultiCategories'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.use_multicategories',
                'description' => 'janvince.smallrecords::lang.components.common.properties.use_multicategories_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_category',
            ],

            'tagSlug'    => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.tag_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.tag_slug_description',
                'type'        => 'string',
                'default'     => '{{ :tag }}',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_tag',
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
            'pageSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.page_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.page_slug_description',
                'type'        => 'string',
                'default'     => '{{ :page }}',
                'group'       => 'janvince.smallrecords::lang.components.common.groups.limit',
            ],

            'orderBy'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.order_by',
                'type'        => 'dropdown',
                'default'     => 'name',
                'group'       => 'janvince.smallrecords::lang.components.common.groups.order',
            ],
            'orderByDirection'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.order_by_direction',
                'type'        => 'dropdown',
                'default'     => 'ASC',
                'group'       => 'janvince.smallrecords::lang.components.common.groups.order',
            ],
            'orderAsCollection'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.order_as_collection',
                'description' => 'janvince.smallrecords::lang.components.common.properties.order_as_collection_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.order',
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

    public function getOrderByOptions()
    {
        return [
            'id' => e(trans('janvince.smallrecords::lang.common.columns.id')),
            'name' => e(trans('janvince.smallrecords::lang.common.columns.name')),
            'url' =>  e(trans('janvince.smallrecords::lang.common.columns.url')),
            'slug' =>  e(trans('janvince.smallrecords::lang.common.columns.slug')),
            'date' => e(trans('janvince.smallrecords::lang.common.columns.date')),
            'active' => e(trans('janvince.smallrecords::lang.common.columns.active')),
            'favourite' => e(trans('janvince.smallrecords::lang.common.columns.favourite')),
            'created_at' => e(trans('janvince.smallrecords::lang.common.columns.created_at')),
            'updated_at' => e(trans('janvince.smallrecords::lang.common.columns.updated_at')),
            'sort_order' => e(trans('janvince.smallrecords::lang.common.columns.sort_order')),
        ];
    }

    public function getOrderByDirectionOptions()
    {
        return [
            'ASC' => e(trans('janvince.smallrecords::lang.common.asc')),
            'DESC' => e(trans('janvince.smallrecords::lang.common.desc')),
        ];
    }

    public function onRender()
    {

        /**
         *  Allow some varibles from component
         */
        $this->page['cssClass'] = $this->property('cssClass');
    }

    public function onRun()
    {

        /**
         *  Pass variables to templates
         */
        $this->page['recordPage'] = $this->page['detailPageSlug'] = $this->property('recordPage');
        $this->page['recordPageSlug'] = $this->page['detailPageParam'] = $this->paramName('recordPageSlug');
    }

    /**
     * Get records
     * array @paramOverride Array of parameters names and values to override
     * return @array
     */
    public function items($paramOverride = []) {

        $pluginManager = PluginManager::instance()->findByIdentifier('Rainlab.Translate');
        
        $records = Record::query();

        /**
         *  Filter area
         */
        if( $this->property('areaSlug') ) {

            $records->whereHas('area', function ($query) use ($pluginManager) {

                if ($pluginManager && !$pluginManager->disabled) {
                    $query->transWhere('slug', $this->property('areaSlug'));
                } else {
                    $query->where('slug', $this->property('areaSlug'));
                }
            });
        }

        /**
         *  Filter category
         */
        if( $this->property('categorySlug') ) {

            if( $this->property('useMainCategory') ) {

                $records->whereHas('category', function ($query) use ($pluginManager) {

                    if ($pluginManager && !$pluginManager->disabled) {
                        $query->transWhere('slug', $this->property('categorySlug'));
                    } else {
                        $query->where('slug', $this->property('categorySlug'));
                    }
                });
            }

            if( $this->property('useMultiCategories') ) {

                $records->whereHas('categories', function ($query) use ($pluginManager) {

                    if ($pluginManager && !$pluginManager->disabled) {
                        $query->transWhere('slug', $this->property('categorySlug'));
                    } else {
                        $query->where('slug', $this->property('categorySlug'));
                    }
                });
            } 
        }

        /**
         *  Filter tag
         */
        if( $this->property('tagSlug') ) {
            
            $records->whereHas('tags', function ($query) use ($pluginManager) {

                if ($pluginManager && !$pluginManager->disabled) {
                    $query->transWhere('slug', $this->property('tagSlug'));
                } else {
                    $query->where('slug', $this->property('tagSlug'));
                }
            });
        }

        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') or !empty($paramOverride['activeOnly']) ) {

            $records->isActive();
         }

        /**
         *  Filter favourite only
         */
         if( $this->property('favouriteOnly') or !empty($paramOverride['favouriteOnly']) ) {

            $records->isFavourite();
         }

        /**
         *  Order
         */
         if( $this->property('orderBy')  ) {

             $allowedColumns = $this->getOrderByOptions();

            if( !empty( $allowedColumns[$this->property('orderBy')] ) ) {

                $orderByColumn = $this->property('orderBy');
            } else {

                $orderByColumn = 'date';
            }

            if( in_array( strtoupper($this->property('orderByDirection')), ['ASC', 'DESC'])) {

                $orderByDirection = strtoupper($this->property('orderByDirection'));
            } else {

                $orderByDirection = 'DESC';
            }

            if( $this->property('orderAsCollection') ) {
            
                $collection = $records->get();

                if($orderByDirection == 'ASC') {
                    $sortedCollection = $collection->sortBy(function($card) use ($orderByColumn) {
                        return iconv('UTF-8', 'ASCII//TRANSLIT', $card->{$orderByColumn}); }
                    );
                } else {
                    $sortedCollection = $collection->sortByDesc(function($card) use ($orderByColumn) {
                        return iconv('UTF-8', 'ASCII//TRANSLIT', $card->{$orderByColumn}); }
                    );
                }
    
                return $sortedCollection;

            } else {

                $records->orderBy($orderByColumn, $orderByDirection);
            }
         }

        /**
         *  Limit
         */
         if( $this->property('allowLimit') and  $this->property('limit') ) {

            return $records->paginate($this->property('limit'), $this->property('pageSlug', 1));
         }

        return $records->get();

    }

    /**
     * Get testimonials from records
     * array @paramOverride Array of parameters names and values to override
     * return @array
     */
    public function testimonials($paramOverride = []) {

        $records = $this->items($paramOverride);

        $records->each( function($record, $key) use($records) {
            if (!is_array($record->testimonials) or !count($record->testimonials)) {
                $records->forget($key);
            }
        });

        return $records;

    }

    /**
     * Change property
     */
    public function changeProperty($propertyName, $propertyValue) {

        if($this->propertyExists($propertyName)) {
            $this->setProperty($propertyName, $propertyValue);
        }
    }
}
