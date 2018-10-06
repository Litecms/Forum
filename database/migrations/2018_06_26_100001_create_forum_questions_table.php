<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateForumQuestionsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: questions
         */
        Schema::create(config('litecms.forum.question.model.table'), function ($table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('user_type')->nullable();
            $table->string('title', 255)->nullable();
            $table->longText('question')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('images', 2555)->nullable();
            $table->integer('viewcount')->nullable();
            $table->enum('published', ['yes','no'])->nullable();
            $table->enum('status', ['show','hide'])->nullable();
            $table->string('upload_folder', 255)->nullable();
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
        Schema::drop(config('litecms.forum.question.model.table'));
    }
}
