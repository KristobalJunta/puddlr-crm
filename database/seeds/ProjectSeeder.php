<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\ProjectTemplate;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pt = ProjectTemplate::all()->first();
        Project::create([
            'name' => 'New Year Trees',
            'slug' => 'new-year-trees',
            'description' => 'Продаем новогодние елочки',
            'project_template_id' => $pt->id,
        ]);
    }
}
