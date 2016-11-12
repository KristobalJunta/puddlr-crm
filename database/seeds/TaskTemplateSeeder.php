<?php

use Illuminate\Database\Seeder;
use App\TaskTemplate;
use App\ProjectTemplate;
use App\Role;

class TaskTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pt = ProjectTemplate::all()->first();

        $designer = Role::where('slug', 'designer')->first();
        $frontEnd = Role::where('slug', 'front-end-dev')->first();
        $backEnd = Role::where('slug', 'back-end-dev')->first();

        TaskTemplate::create([
            'name' => 'Макет',
            'description' => 'Отрисовать макет',
            'time_expected' => 7200,
            'role_id' => $designer->id,
            'project_template_id' => $pt->id,
        ]);

        TaskTemplate::create([
            'name' => 'Слайдер',
            'description' => 'Сверстать слайдер преимуществ',
            'time_expected' => 1800,
            'role_id' => $frontEnd->id,
            'project_template_id' => $pt->id,
        ]);

        TaskTemplate::create([
            'name' => 'Виджет ВК',
            'description' => 'Подключить виджет сообщений паблика ВК',
            'time_expected' => 1200,
            'role_id' => $frontEnd->id,
            'project_template_id' => $pt->id,
        ]);

        TaskTemplate::create([
            'name' => 'База данных',
            'description' => 'Спроекитровать БД для проекта',
            'time_expected' => 7200,
            'role_id' => $backEnd->id,
            'project_template_id' => $pt->id,
        ]);

        TaskTemplate::create([
            'name' => 'Запросы',
            'description' => 'Написать запросы к БД',
            'time_expected' => 5400,
            'role_id' => $backEnd->id,
            'project_template_id' => $pt->id,
        ]);
    }
}
