<?php

namespace JanVince\SmallRecords\Components;

use Db;
use Carbon\Carbon;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use JanVince\SmallRecords\Models\Tag;
use JanVince\SmallRecords\Models\Record;
use JanVince\SmallRecords\Models\Settings;
use JanVince\SmallRecords\Models\Area;

class Tags extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.components.tags.name',
            'description' => 'janvince.smallrecords::lang.components.tags.description',
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

            'tagsPage' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.tags_page',
                'description' => 'janvince.smallrecords::lang.components.common.properties.tags_page_description',
                'type'        => 'dropdown',
                'default'     => 'records',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'tagsPageSlug' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.tags_page_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.tags_page_slug_description',
                'type'        => 'string',
                'default'     => '{{ :tag }}',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'tagPage' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.tag_page',
                'description' => 'janvince.smallrecords::lang.components.common.properties.tag_page_description',
                'type'        => 'dropdown',
                'default'     => 'tag',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.links',
            ],
            'tagPageSlug' => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.tag_page_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.tag_page_slug_description',
                'type'        => 'string',
                'default'     => '{{ :tag }}',
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

    public function getTagsPageOptions(){

        $pages = Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.components.common.forms.empty_option')) ];

        return $emptyOption + $pages;
    }

    public function getTagPageOptions(){

        return $this->getTagsPageOptions();
    }

    public function onRun()
    {

        /**
         *  Pass variables to templates
         */
        $this->page['tagPage'] = $this->property('tagPage');
        $this->page['tagPageSlug'] = $this->paramName('tagPageSlug');
        $this->page['tagsPage'] = $this->property('tagsPage');
        $this->page['tagsPageSlug'] = $this->paramName('tagsPageSlug');
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

        $tags = Tag::query();

        /**
         *  Get only tags with one or more records
         */
        
        $tags->with(['records' => function($query) {
            
            if( $this->property('areaSlug') ) {
                
                $query->whereHas('area', function ($query2) {
                    
                    $query2->where('slug', '=', $this->property('areaSlug'));    
                });
            }    
            
            if( $this->property('activeRecordsOnly') ) {
                
                $query->where('active', '=', true);    
            }    
        }]);
        
        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') ) {
             $tags->isActive();
         }

        /**
         *  Limit
         */
        if( $this->property('allowLimit') and  $this->property('limit') ) {
            $tags->limit($this->property('limit'));
        }

        $tags = $tags->get();

        return $tags;

    }

}
