<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("specializations")->delete();
        $specializations = [
            ['ar' => 'عربى', 'en' => 'Arabic'],
            ['ar' => 'رياضيات', 'en' => 'Math'],
            ['ar' => 'علوم', 'en' => 'Sciences'],
            ['ar' => 'تاريخ', 'en' => 'History'],
            ['ar' => 'انجليزى', 'en' => 'English'],
        ];

        foreach($specializations as $specialization) {
            Specialization::create([
                'name' => $specialization
            ]);
        }
    }
}
