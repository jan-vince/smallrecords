<?php

namespace JanVince\SmallRecords\Models;

use Model;
use Lang;
use JanVince\SmallRecords\Models\Area;

class Settings extends Model
{

    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];

    public $translatable = [];

    public $settingsCode = 'janvince_smallrecords_settings';

    public $settingsFields = 'fields.yaml';

    protected $jsonable = [];

    public function getAreaOptions() {

        $areas = Area::lists('name', 'id');

        $areas[0] = Lang::trans('janvince.smallrecords::lang.common.fields.empty_option');

        ksort($areas);

        return $areas;

    }

    public function getCustomRepeaterAreaOptions() {

        $areas = Area::lists('name', 'id');

        ksort($areas);

        return $areas;

    }

    public function getAllowRecordsInBlogPostsAreaOptions() {

        return $this->getAreaOptions();

    }

    public function getAllowRecordsInPagesAreaOptions() {

        return $this->getAreaOptions();

    }

}
