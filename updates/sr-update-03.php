<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate03 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->string('preview_image_media')->nullable();
        });

    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->dropColumn('preview_image_media');
        });

    }
}
