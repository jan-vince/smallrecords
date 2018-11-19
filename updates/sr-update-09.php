<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate09 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_records', function($table) {
            
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function($table) {

            $table->dropColumn(['created_by', 'updated_by']);
        });
    }
}
