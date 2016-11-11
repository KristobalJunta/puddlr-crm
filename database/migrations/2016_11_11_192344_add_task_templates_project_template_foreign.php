<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTaskTemplatesProjectTemplateForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_templates', function (Blueprint $table) {
            $table->integer('project_template_id')->unsigned()->nullable();

            $table->foreign('project_template_id')
                ->references('id')->on('project_templates')
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
        Schema::table('task_templates', function (Blueprint $table) {
            $table->dropForeign('task_templates_project_template_id_foreign');
        });
    }
}
