<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = new User();
        $admin->name="admin";
        $admin->email="hakan.cakmak@live.com";
        $admin->password=bcrypt('password');
        $admin->visible_password="password";
        $admin->email_verified_at = Now();
        $admin->occupation = "Developer";
        $admin->address= "Turkey";
        $admin->phone = "342342323";
        $admin->is_admin=1;
        $admin->save();

    }
}
