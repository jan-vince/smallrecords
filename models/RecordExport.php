<?php

namespace JanVince\SmallRecords\Models;

use Db;
use \Backend\Models\ExportModel;
use \October\Rain\Support\Collection;

class RecordExport extends ExportModel {

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['list_id'];

    public function getListIdOptions($value, $formData) {

        $areas = [];

        $areas = Area::orderBy('name')->lists('name', 'id');

        $emptyOption = [0 => e(trans('janvince.smallrecords::lang.areas.import.area_id_empty_option')) ];

        return $emptyOption + $areas;

    }

    public function exportData($columns, $sessionKey = null)
    {

        $records = Record::all();

        $records->each(function($record) use ($columns) {

            $record->addVisible($columns);

        });

        $records->transform( function($item, $key) {

            $item->testimonials = json_encode($item->testimonials);
            $item->repeater = json_encode($item->repeater);

            return $item;

        });

        return $records->toArray();

    }

}
