<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("genders")->delete();
        $genders = [
            ['ar' => 'ذكر', 'en' => 'Male'],
            ['ar' => 'انثى', 'en' => 'Female']
        ];

        foreach($genders as $gender) {
            Gender::create([
                'name' => $gender
            ]);
        }
    }
}
