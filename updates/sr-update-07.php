<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate07 extends Migration
{
    public function up()
    {

        Schema::create('janvince_smallrecords_records_posts', function($table)
        {
            $table->engine = 'InnoDB';

            $table->integer('record_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->primary(['record_id', 'post_id'], 'janvince_smallrecords_record_post');

            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('janvince_smallrecords_records_posts');
    }
}
