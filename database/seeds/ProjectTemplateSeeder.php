<?php

use Illuminate\Database\Seeder;
use App\ProjectTemplate;
use App\Team;

class ProjectTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = Team::all()->first();

        ProjectTemplate::create([
            'name' => 'Промо страница',
            'description' => 'Это как лендос, но не лендос',
            'team_id' => $team->id,
        ]);
    }
}
