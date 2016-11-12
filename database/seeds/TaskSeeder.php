<?php

use Illuminate\Database\Seeder;
use App\TaskTemplate;
use App\Task;
use App\Project;
use App\Role;
use App\User;
use App\Status;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = Project::all()->first();

        $designer = User::where('username', 'johnny')->first();
        $frontEnd = User::where('username', 'jimmy')->first();
        $backEnd = User::where('username', 'willy')->first();

        $status = Status::where('name', 'Not started')->first();

        Task::create([
            'name' => 'Макет главной',
            'description' => 'Отрисовать макет главной страницы',
            'time_expected' => 7200,
            'user_id' => $designer->id,
            'project_id' => $project->id,
            'status_id' => $status->id,
        ]);

        Task::create([
            'name' => 'Слайдер преимуществ',
            'description' => 'Сверстать слайдер преимуществ',
            'time_expected' => 1800,
            'user_id' => $frontEnd->id,
            'project_id' => $project->id,
            'status_id' => $status->id,
        ]);

        Task::create([
            'name' => 'Виджет ВК',
            'description' => 'Подключить виджет сообщений паблика ВК',
            'time_expected' => 1200,
            'user_id' => $frontEnd->id,
            'project_id' => $project->id,
            'status_id' => $status->id,
        ]);

        Task::create([
            'name' => 'База данных',
            'description' => 'Спроекитровать БД для проекта',
            'time_expected' => 7200,
            'user_id' => $backEnd->id,
            'project_id' => $project->id,
            'status_id' => $status->id,
        ]);

        Task::create([
            'name' => 'Запросы',
            'description' => 'Написать запросы к БД',
            'time_expected' => 5400,
            'user_id' => $backEnd->id,
            'project_id' => $project->id,
            'status_id' => $status->id,
        ]);
    }
}
