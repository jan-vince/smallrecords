<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTablesUpdate08 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallrecords_areas', function($table) {
            
            $table->boolean('custom_repeater_allow')->nullable();
            $table->string('custom_repeater_tab_title')->nullable();
            $table->string('custom_repeater_prompt')->nullable();
            $table->integer('custom_repeater_min_items')->default(1);
            $table->integer('custom_repeater_max_items')->default(1);
            $table->text('custom_repeater_fields')->nullable();
        });

        Schema::table('janvince_smallrecords_records', function($table) {
            
            $table->text('custom_repeater')->nullable();
        });
    }

    public function down()
    {

        Schema::table('janvince_smallrecords_areas', function($table) {

            $table->dropColumn(['custom_repeater_allow', 'custom_repeater_tab_title', 'custom_repeater_prompt', 'custom_repeater_min_items', 'custom_repeater_max_items', 'custom_repeater_fields']);
        });

        Schema::table('janvince_smallrecords_records', function($table) {

            $table->dropColumn('custom_repeater');
        });
    }
}
