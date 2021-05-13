<?php

namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate12 extends Migration
{
    public function up()
    {
        Schema::table('janvince_smallrecords_records', function ($table) {
            $table->string('url', 600)->nullable()->change();
        });
    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function ($table) {
            $table->string('url')->comment('')->change();
        });
    }
}
