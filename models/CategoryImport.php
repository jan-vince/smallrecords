<?php

namespace JanVince\SmallRecords\Models;

use \Backend\Models\ImportModel;
use Db;

class CategoryImport extends ImportModel {

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
                Db::table('janvince_smallrecords_categories')->truncate();
            } catch(\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }

        if ($this->delete_relations) {

            try {
                Db::table('janvince_smallrecords_records_categories')->truncate();
            } catch(\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }

        foreach ($results as $row => $data) {

            try {
                $category = new Category;
                $category->fill($data);
                $category->save();

                $this->logCreated();

            } catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }

        }

    }

}
