<?php

use Illuminate\Database\Migrations\Migration;

class CreateForumsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: forums
         */
        Schema::create('forums', function ($table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('published')->nullable();
            $table->tinyInteger('best_answer')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['show', 'hide'])->default('hide')->nullable();
            $table->string('user_type', 200)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });

        /*
         * Table: forum_categories
         */
        Schema::create('forum_categories', function ($table) {
            $table->increments('id');
            $table->string('name', 50)->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['show', 'hide'])->default('show')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('forums');
        Schema::drop('forum_categories');
    }
}
