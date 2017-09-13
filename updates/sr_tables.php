<?php namespace JanVince\SmallRecords\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallRecordsTables extends Migration
{
    public function up()
    {

        Schema::create('janvince_smallrecords_records', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('area_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index()->nullable();

            $table->string('name')->nullable();
            $table->string('slug')->nullable()->index();

            $table->text('description')->nullable();
            $table->text('content')->nullable();

            $table->string('url')->nullable()->index();

            $table->datetime('date')->nullable();

            $table->boolean('active')->nullable();
            $table->boolean('favourite')->nullable();

            $table->text('repeater')->nullable();

            $table->timestamps();
        });

        Schema::create('janvince_smallrecords_areas', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name')->nullable()->index();
            $table->string('slug')->nullable()->index();

            $table->boolean('active')->nullable();

            $table->text('description')->nullable();

            $table->text('allowed_fields')->nullable();

            $table->timestamps();
        });

        Schema::create('janvince_smallrecords_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->index()->nullable();

            $table->integer('nest_left')->unsigned()->index()->nullable();
            $table->integer('nest_right')->unsigned()->index()->nullable();
            $table->integer('nest_depth')->unsigned()->index()->nullable();

            $table->integer('sort_order')->unsigned()->index()->nullable();

            $table->string('name')->nullable()->index();
            $table->string('slug')->nullable()->index();

            $table->boolean('active')->nullable();

            $table->text('description')->nullable();
            $table->text('content')->nullable();

            $table->timestamps();
        });

        Schema::create('janvince_smallrecords_records_categories', function($table)
        {
            $table->engine = 'InnoDB';

            $table->integer('record_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->primary(['record_id', 'category_id'], 'janvince_smallrecords_record_category');

            $table->timestamps();
        });

        Schema::create('janvince_smallrecords_tags', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name')->nullable()->index();
            $table->string('slug')->nullable()->index();

            $table->boolean('active')->nullable();

            $table->text('description')->nullable();
            $table->text('content')->nullable();

            $table->timestamps();
        });

        Schema::create('janvince_smallrecords_records_tags', function($table)
        {
            $table->engine = 'InnoDB';

            $table->integer('record_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->primary(['record_id', 'attribute_id'], 'janvince_smallrecords_record_attribute');

            $table->timestamps();
        });

        Schema::create('janvince_smallrecords_attributes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name')->nullable()->index();
            $table->string('slug')->nullable()->index();

            $table->string('value_type')->nullable();

            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('janvince_smallrecords_records_attributes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('record_id')->unsigned();

            $table->integer('attribute_id')->unsigned();

            $table->primary(['record_id', 'attribute_id']);

            $table->char('value_string', 255)->nullable()->index();
            $table->text('value_text')->nullable();
            $table->decimal('value_number', 9, 2)->nullable()->index();
            $table->boolean('value_boolean')->nullable()->index();

            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('janvince_smallrecords_areas');

        Schema::dropIfExists('janvince_smallrecords_records');

        Schema::dropIfExists('janvince_smallrecords_categories');
        Schema::dropIfExists('janvince_smallrecords_records_categories');

        Schema::dropIfExists('janvince_smallrecords_attributes');
        Schema::dropIfExists('janvince_smallrecords_records_attributes');

        Schema::dropIfExists('janvince_smallrecords_tags');
        Schema::dropIfExists('janvince_smallrecords_records_tags');
    }
}
