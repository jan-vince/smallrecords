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

class CategoryDetail extends ComponentBase
{

    /**
    * Selected record
     * @var JanVince\SmallRecords\Models\Category
     */
    public $categoryDetail;

    public function componentDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.components.category.name',
            'description' => 'janvince.smallrecords::lang.components.category.description',
        ];
    }

    public function defineProperties()
    {

        return [
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
            'throw404'   => [
                'title'       => 'janvince.smallrecords::lang.components.category.properties.throw404',
                'description' => 'janvince.smallrecords::lang.components.category.properties.throw404_description',
                'type'        => 'checkbox',
                'default'     => false,
            ],
        ];

    }

    public function onRun()
    {

        $this->categoryDetail = $this->page['categoryDetail'] = $this->getCategory();

        if( $this->property('categorySlug') and !$this->categoryDetail ){
            abort(404, 'Record not found!');
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
     * Get category with filters from properties
     * return @array
     */
    private function getCategory() {

        $category = Category::with('records');
        /**
         *  Filter slug
         */
        $category = Category::where('slug', $this->property('categorySlug'));

        /**
         *  Filter active only
         */
         if( $this->property('activeOnly') ) {
             $category->isActive();
         }

        $categoryDetail = $category->first();

        return $categoryDetail;

    }

}
