<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(ProjectTemplateSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TaskTemplateSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(QuotaSeeder::class);
    }
}
