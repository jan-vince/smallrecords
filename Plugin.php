<?php

namespace JanVince\SmallRecords;

use Backend;
use BackendAuth;
use Controller;
use Config;
use System\Classes\PluginBase;
use Event;
use JanVince\SmallRecords\Models\Settings;
use JanVince\SmallRecords\Models\Area;

class Plugin extends PluginBase
{

    /**
     * @var array Plugin dependencies
     */
    public $require = [];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'janvince.smallrecords::lang.plugin.name',
            'description' => 'janvince.smallrecords::lang.plugin.description',
            'author'      => 'Jan Vince',
            'icon'        => 'icon-archive'
        ];
    }

    public function registerSettings() {

        return [
            'settings' => [
                'label' => 'janvince.smallrecords::lang.plugin.name_original',
                'description' => 'janvince.smallrecords::lang.plugin.description',
                'category' => 'Small plugins',
                'icon' => 'icon-archive',
                'class' => 'JanVince\smallrecords\Models\Settings',
                'keywords' => 'portfolio partners sponsors records data categories tags attributes',
                'order' => 991,
                'permissions' => ['janvince.smallrecords.access_settings'],
            ]
        ];
    }

    public function registerNavigation()
    {
        $nav = [
            'smallrecords' => [
                'label'       => 'janvince.smallrecords::lang.plugin.name_short',
                'url'         => Backend::url('janvince/smallrecords/areas'),
                'icon'        => 'icon-archive',
                'permissions' => ['janvince.smallrecords.*'],
                'order'       => 991,

                'sideMenu' => []
            ]
        ];

        $areas = Area::get();
        $customArea = null;

        foreach( $areas as $area ) {

            $user = BackendAuth::getUser();

            if ( !$user->hasAccess([('janvince.smallrecords.access_area_'.$area->id)]) ) {
                continue;
            }

            if( !$customArea ) {
                $nav['smallrecords']['url'] = Backend::url('janvince/smallrecords/records/index', ['area_id' => $area->id]);
                $customArea = true;
            }

            $nav['smallrecords']['sideMenu'][('rec' . $area->id)] = [
                'label'       => $area->name,
                'icon'        => 'icon-archive',
                'url'         => Backend::url('janvince/smallrecords/records/index/' . $area->id ),
                'permissions' => [('janvince.smallrecords.access_area_'.$area->id)]
            ];

        }

        $sideMenu = [
            'areas' => [
                'label'       => 'janvince.smallrecords::lang.common.menu.areas',
                'icon'        => 'icon-database',
                'url'         => Backend::url('janvince/smallrecords/areas'),
                'permissions' => ['janvince.smallrecords.access_areas']
            ],
            'categories' => [
                'label'       => 'janvince.smallrecords::lang.categories.menu_label',
                'icon'        => 'icon-sitemap',
                'url'         => Backend::url('janvince/smallrecords/categories'),
                'permissions' => ['janvince.smallrecords.access_categories']
            ],
            'tags' => [
                'label'       => 'janvince.smallrecords::lang.tags.menu_label',
                'icon'        => 'icon-tags',
                'url'         => Backend::url('janvince/smallrecords/tags'),
                'permissions' => ['janvince.smallrecords.access_tags']
            ],
            'attributes' => [
                'label'       => 'janvince.smallrecords::lang.attributes.menu_label',
                'icon'        => 'icon-puzzle-piece',
                'url'         => Backend::url('janvince/smallrecords/attributes'),
                'permissions' => ['janvince.smallrecords.access_attributes']
            ],
        ];

        $nav['smallrecords']['sideMenu'] = array_merge($nav['smallrecords']['sideMenu'], $sideMenu);

        return $nav;

    }

    public function registerPermissions()
    {
        $permissions = [
            'janvince.smallrecords.access_areas' => [
                'tab'   => 'janvince.smallrecords::lang.permissions.tab_name',
                'label' => 'janvince.smallrecords::lang.permissions.access_areas'
            ],
            'janvince.smallrecords.access_categories' => [
                'tab'   => 'janvince.smallrecords::lang.permissions.tab_name',
                'label' => 'janvince.smallrecords::lang.permissions.access_categories'
            ],
            'janvince.smallrecords.access_tags' => [
                'tab'   => 'janvince.smallrecords::lang.permissions.tab_name',
                'label' => 'janvince.smallrecords::lang.permissions.access_tags'
            ],
            'janvince.smallrecords.access_attributes' => [
                'tab'   => 'janvince.smallrecords::lang.permissions.tab_name',
                'label' => 'janvince.smallrecords::lang.permissions.access_attributes'
            ],

            // 'janvince.smallrecords.access_records' => [
            //     'tab'   => 'janvince.smallrecords::lang.permissions.tab_name',
            //     'label' => 'janvince.smallrecords::lang.permissions.access_records'
            // ],

            'janvince.smallrecords.access_settings' => [
                'tab'   => 'janvince.smallrecords::lang.permissions.tab_name',
                'label' => 'janvince.smallrecords::lang.permissions.access_settings'
            ],

        ];

        $areas = Area::get();
        $customPermissions = null;

        foreach( $areas as $area ) {

            $customPermissions[('janvince.smallrecords.access_area_'.$area->id)] = [
                'tab'   => 'janvince.smallrecords::lang.permissions.tab_name',
                'label' => (e(trans('janvince.smallrecords::lang.permissions.access_area')) . $area->name),
            ];

        }

        return array_merge($permissions, $customPermissions);

    }

    public function registerComponents()
    {
        return [
            'JanVince\SmallRecords\Components\Records' => 'records',
            'JanVince\SmallRecords\Components\RecordDetail' => 'recordDetail',
            'JanVince\SmallRecords\Components\Categories' => 'categories',
            'JanVince\SmallRecords\Components\CategoryDetail' => 'categoryDetail',
        ];
    }

    /**
    *  Custom list types
    */
    public function registerListColumnTypes()
    {

        $mediaPath = url(Config::get('cms.storage.media.path'));

        return [
            'strong' => function($value) { return '<strong>'. $value . '</strong>'; },
            'text_preview' => function($value) { $content = mb_substr(strip_tags($value), 0, 150); if(strlen($content) > 150) { return ($content . '...'); } else { return $content; } },
            'array_preview' => function($value) { $content = mb_substr(strip_tags( implode(' --- ', $value) ), 0, 150); if(count($content) > 150) { return ($content . '...'); } else { return $content; } },
            'switch_icon_star' => function($value) { return '<div class="text-center"><span class="'. ($value==1 ? 'oc-icon-circle text-success' : 'text-muted oc-icon-circle text-draft') .'">' . ($value==1 ? e(trans('janvince.smallcontactform::lang.models.message.columns.new')) : e(trans('janvince.smallcontactform::lang.models.message.columns.read')) ) . '</span></div>'; },
            'switch_extended_input' => function($value) { if($value){return '<input type="checkbox" checked>';} else { return '<input type="checkbox">';} },
            'switch_extended' => function($value) { if($value){return '<span class="list-badge badge-success"><span class="icon-check"></span></span>';} else { return '<span class="list-badge badge-danger"><span class="icon-minus"></span></span>';} },
            'attached_images_count' => function($value){ return (count($value) ? count($value) : NULL); },
            'record_image_preview' => function($value) {
                $width = Settings::get('records_list_preview_width', 50);
                $height = Settings::get('records_list_preview_height', 50);

                if($value){ return "<img src='".$value->getThumb($width, $height)."' style='width: auto; height: auto; max-width: ".$width."px; max-height: ".$height."px'>"; }
            },
            'record_image_preview_media' => function($value) use ($mediaPath) {
                $width = Settings::get('records_list_preview_width', 50);
                $height = Settings::get('records_list_preview_height', 50);

                if($value) 
                { 
                    return "<img src='".$mediaPath.$value."' style='width: auto; height: auto; max-width: ".$width."px; max-height: ".$height."px'>"; 
                }
            },
            'tags_names' => function($values){ $names = []; if( $values->count() > 0 ) { foreach($values as $value) { $names[] = $value->name; } } return implode(', ', $names); },
        ];
    }

}
