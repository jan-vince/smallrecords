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
                'default'     => 'true',
            ],
            'detailPageSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.detail_page_slug',
                'description' => 'janvince.smallrecords::lang.components.records.properties.detail_page_slug_description',
                'type'        => 'dropdown',
                'default'     => 'records/detail',
                'group'       => 'janvince.smallrecords::lang.components.records.properties.groups.links',
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

    public function onRender()
    {

        /**
         *  Allow some varibles from component
         */
        $this->page['cssClass'] = $this->property('cssClass');

    }

    /**
     * Get records with filters from properties
     * return @array
     */
    public function items() {

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
         if( $this->property('activeOnly') ) {

             $records->isActive();

         }

        return $records->get();

    }


}
