<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_intervals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duration')->unsigned();
            $table->integer('task_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('time_intervals', function (Blueprint $table) {
            $table->dropForeign('time_intervals_task_id_foreign');
            $table->dropForeign('time_intervals_user_id_foreign');
        });
        Schema::dropIfExists('time_intervals');
    }
}
