<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate02 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->unique(['area_id', 'slug'], 'area_slug_unique');
        });

    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->dropUnique('area_slug_unique');
        });

    }
}
