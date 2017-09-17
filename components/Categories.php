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
                'title' => 'janvince.smallrecords::lang.components.records.properties.area',
                'type'  => 'dropdown',
                'default' => false,
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

    public function onRun()
    {

        // $this->page['detailPage'] = $this->property('detailPage');
        //
        // if($this->property('slug')) {
        //     $category = $this->getRecord();
        //
        //     $this->page['category'] = $category;
        //     $this->page->title = $this->page->title . ' (' . $category->name . ')';
        //     $this->page->meta_description = strip_tags($category->description);
        //
        // }

    }

    /**
     * Get categories
     * return @array
     */
    public function items() {

        $categories = Category::with('records');

        /**
         *  Filter records by area
         */
        if( $this->property('areaSlug') ) {
            $categories->whereHas('records', function ($query) {
                $query->whereHas('area', function ($query) {
                    $query->where('slug', '=', $this->property('areaSlug'));
                });
            });

        }

        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') ) {
             $categories->isActive();
         }

        return $categories->get();

    }

}
