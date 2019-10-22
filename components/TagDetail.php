<?php

namespace JanVince\SmallRecords\Components;

use Db;
use Carbon\Carbon;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use System\Classes\PluginManager;
use JanVince\SmallRecords\Models\Tag;
use JanVince\SmallRecords\Models\Record;
use JanVince\SmallRecords\Models\Settings;
use JanVince\SmallRecords\Models\Area;

class TagDetail extends ComponentBase
{

    /**
    * Selected record
     * @var JanVince\SmallRecords\Models\Tag
     */
    public $tagDetail;

    public function componentDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.components.tag.name',
            'description' => 'janvince.smallrecords::lang.components.tag.description',
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

            'tagSlug'    => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.tag_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.tag_slug_description',
                'type'        => 'string',
                'default'     => '{{ :tag }}',
            ],

            'areaSlug'  => [
                'title' => 'janvince.smallrecords::lang.components.common.properties.area_slug',
                'description' => 'janvince.smallrecords::lang.components.common.properties.area_slug_description',
                'type'  => 'dropdown',
                'group'         => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],
            'activeRecordsOnly'      => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.active_records_only',
                'description' => 'janvince.smallrecords::lang.components.common.properties.active_records_only_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallrecords::lang.components.common.groups.filter_records',
            ],

            'setPageMeta'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.set_page_meta',
                'description' => 'janvince.smallrecords::lang.components.common.properties.set_page_meta_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.seo',
            ],
            'throw404'   => [
                'title'       => 'janvince.smallrecords::lang.components.common.properties.throw404',
                'description' => 'janvince.smallrecords::lang.components.common.properties.throw404_description',
                'type'        => 'checkbox',
                'default'     => false,
                'group'         => 'janvince.smallrecords::lang.components.common.groups.seo',
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

    public function onRun()
    {

        $this->tagDetail = $this->page['tagDetail'] = $this->getTag();

        if( $this->property('tagSlug') and !$this->tagDetail ){
            abort(404, 'Tag not found!');
        }

        if( $this->property('setPageMeta') and $this->tagDetail ){
            $this->page->meta_title = $this->page->title = strip_tags($this->tagDetail->name);
            $this->page->meta_description = strip_tags($this->tagDetail->description);
        }
    }

    public function onRender()
    {

        /**
         *  Allow some varibles from component
         */
        $this->page['cssClass'] = $this->property('cssClass');
    }

    /**
     * Get tag with filters from properties
     * return @array
     */
    private function getTag() {

        if (empty($this->property('tagSlug'))) {
            return null;
        }

        $pluginManager = PluginManager::instance()->findByIdentifier('Rainlab.Translate');

        $tag = Tag::query();
        
        $tag->with(['records' => function($query) {
            
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
         *  Filter slug
         */
        if ($pluginManager && !$pluginManager->disabled) {
            $tag->transWhere('slug', $this->property('tagSlug'));
        } else {
            $tag->where('slug', $this->property('tagSlug'));
        }

        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') ) {
             $tag->isActive();
         }

        $tagDetail = $tag->first();

        return $tagDetail;

    }

}
