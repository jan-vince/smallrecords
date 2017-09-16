<?php

namespace JanVince\SmallRecords\Models;

use \Backend\Models\ExportModel;

class CategoryExport extends ExportModel {

    public function exportData($columns, $sessionKey = null)
    {
        $category = Category::all();
        $category->each(function($category) use ($columns) {
            $category->addVisible($columns);
        });

        return $category->toArray();
        
    }

}
