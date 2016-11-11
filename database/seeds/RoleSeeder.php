<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Менеджер',
            'slug' => 'admin',
        ]);

        Role::create([
            'name' => 'Front-end dev',
            'slug' => 'front-end-dev',
        ]);

        Role::create([
            'name' => 'Back-end dev',
            'slug' => 'back-end-dev',
        ]);

        Role::create([
            'name' => 'Designer',
            'slug' => 'designer',
        ]);
    }
}
