<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'SuperAdmin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
        ]);
    } // End Run
}
