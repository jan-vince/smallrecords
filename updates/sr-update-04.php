<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate04 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->integer('sort_order')->unsigned()->index()->nullable();
        });

    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->dropColumn('sort_order');
        });

    }
}
