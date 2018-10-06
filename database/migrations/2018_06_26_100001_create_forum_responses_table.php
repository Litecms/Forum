<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateForumResponsesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: responses
         */
        Schema::create(config('litecms.forum.response.model.table'), function ($table) {
            $table->increments('id');
            $table->integer('question_id')->nullable();
            $table->string('comment', 255)->nullable();
            $table->string('images', 2555)->nullable();
            $table->enum('status', ['show','hide'])->nullable();
            $table->enum('best_answer', ['yes','no'])->nullable();
            $table->integer('user_id')->nullable();
            $table->text('user_type')->nullable();
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
        Schema::drop(config('litecms.forum.response.model.table'));
    }
}
