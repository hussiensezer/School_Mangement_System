<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(BloodTypeTableSeeder::class);
         $this->call(NationalityTableSeeder::class);
         $this->call(ReligionTableSeeder::class);
         $this->call(GenderTableSeeder::class);
         $this->call(SpecializationTableSeeder::class);

    }
}
