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
            'recordSlug'   => [
                'title'       => 'janvince.smallrecords::lang.components.record.properties.record_slug',
                'description' => 'janvince.smallrecords::lang.components.record.properties.record_slug_description',
                'type'        => 'string',
                'default'     => '{{ :slug }}',
            ],
        ];

    }

    public function getAreaSlugOptions() {
        return  Area::isActive()->orderBy('name')->lists('name', 'slug');
    }

    public function onRun()
    {
        $this->page['recordDetail'] = $this->getRecord();
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
    public function getRecord() {

        /**
         *  Filter area
         */
        $record = Record::whereHas('area', function ($query) {
            $query->where('slug', '=', $this->property('areaSlug'));
        });

        /**
         *  Filter slug
         */
        $record = Record::where('slug', $this->property('recordSlug'));

        /**
         *  Filter category
         */
        if( $this->property('categorySlug') ) {
            $record->whereHas('category', function ($query) {
                $query->where('slug', '=', $this->property('categorySlug'));
            });
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


}
