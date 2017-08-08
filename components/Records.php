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
            'areaSlug' => [
                'title' => 'janvince.smallrecords::lang.components.records.properties.area',
                'type' => 'dropdown'
            ],
            'categorySlug' => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.category',
                'description'       => 'janvince.smallrecords::lang.components.records.properties.category_description',
                'type'        => 'string',
                'default'     => '{{ :category }}'
            ],
            'activeOnly' => [
                'title'       => 'janvince.smallrecords::lang.components.records.properties.active_only',
                'description'       => 'janvince.smallrecords::lang.components.records.properties.active_only_description',
                'type'        => 'checkbox',
                'default'     => 'true'
            ],
        ];

    }

    public function getAreaSlugOptions() {
        return  Area::isActive()->orderBy('name')->lists('name', 'slug');
    }


    public function onRun()
    {

        // Prepare vars
        // $this->areaSlug = $this->page['areaSlug'] = $this->property('areaSlug');
        // $this->areaSlug = $this->page['categorySlug'] = $this->paramName();


    }

    /**
     * Get all records with filters from properties
     * return @array
     */
    public function all() {

trace_sql();

        return Record::category()->where('slug', $this->param('categorySlug'))->get();

//        return Record::getAllRecords($this->param('areaSlug'), $this->param('cateforySlug'), $this->param('activeOnly'));

    }


}
