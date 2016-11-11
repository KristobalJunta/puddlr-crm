<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Project;
use App\Quota;

class QuotaSeeder extends Seeder
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

        Quota::create([
            'user_id' => $designer->id,
            'project_id' => $project->id,
            'time' => 14400,
        ]);

        Quota::create([
            'user_id' => $frontEnd->id,
            'project_id' => $project->id,
            'time' => 14400,
        ]);

        Quota::create([
            'user_id' => $backEnd->id,
            'project_id' => $project->id,
            'time' => 14400,
        ]);
    }
}
