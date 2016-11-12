<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'Not started']);
        Status::create(['name' => 'In progress']);
        Status::create(['name' => 'Testing']);
        Status::create(['name' => 'Done']);
        Status::create(['name' => 'Not needed']);
    }
}
