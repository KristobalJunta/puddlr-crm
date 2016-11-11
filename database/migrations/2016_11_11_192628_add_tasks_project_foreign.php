<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTasksProjectForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('project_id')->unsigned()->nullable();

            $table->foreign('project_id')
                ->references('id')->on('projects')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('task_templates_project_id_foreign');
        });
    }
}
