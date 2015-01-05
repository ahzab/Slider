<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSliderTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         * Table: slider_langs
         */
        Schema::create('slider_langs', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('lang',3);
        });

        /**
         * Table: sliders
         */
        Schema::create('sliders', function($table) {
            $table->increments('id');
            $table->string('slug');
            $table->boolean('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });

        /**
         * Table: slider_items
         */
        Schema::create('slider_items', function($table) {
            $table->increments('id');
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('created_at')->default("0000-00-00 00:00:00");
            $table->timestamp('updated_at')->default("0000-00-00 00:00:00");
        });

        /**
         * Table: slider_item_langs
         */
        Schema::create('slider_item_langs', function($table) {
            $table->increments('id');
            $table->string('heading');
            $table->text('content');
            $table->string('lang',3);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sliders');
        Schema::drop('slider_langs');
        Schema::drop('slider_items');
        Schema::drop('slider_item_langs');
    }

}
