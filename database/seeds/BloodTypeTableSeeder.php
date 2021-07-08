<?php

use App\Models\BloodType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->delete();
        $bloodTypes = ['O-','O+','A+','A-','B+','B-','AB+','AB-'];

        foreach($bloodTypes as $type) {
            BloodType::create(['type' => $type]);
        }
    }
}
