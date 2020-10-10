<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate10 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_records', function($table) {
            $table->mediumText('content_blocks')->change();
        });
    }

    public function down()
    {

    }
}
