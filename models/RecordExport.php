<?php

namespace JanVince\SmallRecords\Models;

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

        if( $this->list_id ) {
            $record = Record::where('area_id', '=', $this->list_id)->get();

        } else {
            $record = Record::all();
        }

        $record->each(function($record) use ($columns) {
            $record->addVisible($columns);
        });

        return $record->toArray();

    }

}
