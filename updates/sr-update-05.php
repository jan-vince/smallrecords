<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate05 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->text('images_media')->nullable();
        });

    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->dropColumn('images_media');
        });

    }
}
