<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate01 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->text('testimonials')->nullable();
        });

    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function($table)
        {
            $table->dropColumn('testimonials');
        });

    }
}
