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

class Records extends ComponentBase
{
    public $detailPageSlug;
    
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
            'areaSlug'  => [
                'title' => 'janvince.smallrecords::lang.components.records.properties.area',
                'type'  => 'dropdown',
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
            'favouriteOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.favourite_only',
                'description' => 'janvince.smallrecords::lang.components.records.properties.favourite_only_description',
                'type'        => 'checkbox',
                'default'     => false,
            ],
            'detailPageSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.detail_page_slug',
                'description' => 'janvince.smallrecords::lang.components.records.properties.detail_page_slug_description',
                'type'        => 'dropdown',
                'default'     => 'records/detail',
                'group'       => 'janvince.smallrecords::lang.components.records.properties.groups.links',
            ],
            'orderBy'   => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.order_by',
                'type'        => 'dropdown',
                'default'     => 'date',
                'group'       => 'janvince.smallrecords::lang.components.records.properties.groups.sort',
            ],
            'orderByDirection'   => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.order_by_direction',
                'type'        => 'dropdown',
                'default'     => 'DESC',
                'group'       => 'janvince.smallrecords::lang.components.records.properties.groups.sort',
            ],
        ];

    }

    public function getAreaSlugOptions() {
        return  Area::isActive()->orderBy('name')->lists('name', 'slug');
    }

    public function getDetailPageSlugOptions()
    {
        return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }

    public function getOrderByOptions()
    {
        return [
            'date' => e(trans('janvince.smallrecords::lang.common.columns.date')),
            'name' => e(trans('janvince.smallrecords::lang.common.columns.name')),
            'url' =>  e(trans('janvince.smallrecords::lang.common.columns.url')),
            'active' => e(trans('janvince.smallrecords::lang.common.columns.active')),
            'favourite' => e(trans('janvince.smallrecords::lang.common.columns.favourite')),
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
        $this->page['detailPageSlug'] = $this->property('detailPageSlug');

    }
    
    public function onRun()
    {
        $this->detailPageSlug = $this->property('detailPageSlug');
    }

    /**
     * Get records
     * array @paramOverride Array of parameters names and values to override
     * return @array
     */
    public function items($paramOverride = []) {

        /**
         *  Filter area
         */
        $records = Record::whereHas('area', function ($query) {
            $query->where('slug', '=', $this->property('areaSlug'));
        });

        /**
         *  Filter category
         */
        if( $this->property('categorySlug') ) {
            $records->whereHas('category', function ($query) {
                $query->where('slug', '=', $this->property('categorySlug'));
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
             $records->orderBy($this->property('orderBy'), $this->property('orderByDirection'));
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
