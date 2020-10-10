<?php

namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate11 extends Migration
{
    public function up()
    {
        /**
         * There is a bug in Laravel migration when change from TEXT to MEDIUMTEXT
         * Using comment to bypass this
         * Original idea from: https://github.com/doctrine/dbal/issues/2566
         */
        Schema::table('janvince_smallrecords_records', function ($table) {
            $table->mediumText('content_blocks')->comment(' ')->change();
        });
    }

    public function down()
    {

        Schema::table('janvince_smallrecords_records', function ($table) {
            $table->mediumText('content_blocks')->comment('')->change();
        });
    }
}
