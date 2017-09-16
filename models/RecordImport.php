<?php

namespace JanVince\SmallRecords\Models;

use \Backend\Models\ImportModel;
use Db;

class RecordImport extends ImportModel {

    /**
     *  Validation rules
     *  @var array
     */
     public $rules = [
         'name'   => 'required',
         'slug'   => 'required',
     ];

    public function importData($results, $sessionKey = null) {

        if ($this->truncate_table) {

            try {
                Db::table('janvince_smallrecords_records')->truncate();
            } catch(\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }

        if ($this->delete_relations) {

            try {
                Db::table('janvince_smallrecords_records_categories')->truncate();
                Db::table('janvince_smallrecords_records_tags')->truncate();
                Db::table('janvince_smallrecords_records_attributes')->truncate();
            } catch(\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }

        foreach ($results as $row => $data) {

            try {
                $record = new Record;
                $record->fill($data);
                $record->save();

                $this->logCreated();

            } catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }

    }

}
