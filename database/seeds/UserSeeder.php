<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Team;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = Team::all()->first();

        $admin = Role::where('slug', 'admin')->first();
        $designer = Role::where('slug', 'designer')->first();
        $frontEnd = Role::where('slug', 'front-end-dev')->first();
        $backEnd = Role::where('slug', 'back-end-dev')->first();

        User::create([
            'name' => 'Bob',
            'email' => 'bob@localhost',
            'password' => bcrypt('password'),
            'username' => 'bob',
            'avatar' => 'img/bob.jpg',
            'role_id' => $admin->id,
            'team_id' => $team->id,
        ]);

        User::create([
            'name' => 'Johnny',
            'email' => 'johnny@localhost',
            'password' => bcrypt('password'),
            'username' => 'johnny',
            'avatar' => 'img/johnny.jpg',
            'role_id' => $designer->id,
            'team_id' => $team->id,
        ]);

        User::create([
            'name' => 'Jimmy',
            'email' => 'jimmy@localhost',
            'password' => bcrypt('password'),
            'username' => 'jimmy',
            'avatar' => 'img/jimmy.jpg',
            'role_id' => $frontEnd->id,
            'team_id' => $team->id,
        ]);

        User::create([
            'name' => 'Willy',
            'email' => 'willy@localhost',
            'password' => bcrypt('password'),
            'username' => 'willy',
            'avatar' => 'img/willy.jpg',
            'role_id' => $backEnd->id,
            'team_id' => $team->id,
        ]);
    }
}
