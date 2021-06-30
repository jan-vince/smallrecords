<?php

namespace JanVince\SmallRecords\Models;

use \Backend\Models\ImportModel;
use Db;
use Log;

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

            $record = new Record;

            if( isset($data['date']) and $data['date'] == '')
            {
                $data['date'] = null;
            }

            $record->fill($data);

            /**
             * Reinsert images_media as fill not work for json fields
             */
            if( isset($data['images_media']))
            {
                $record->images_media = json_decode($data['images_media']);
            }

            $record->save();
            
            $this->logCreated();
            try {

            } catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }

    }

}
