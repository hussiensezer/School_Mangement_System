<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->string("email")->unique();
            $table->string("password");
            // Father Information's
            $table->string("father_name");
            $table->string("national_id_father");
            $table->string("passport_id_father");
            $table->string("phone_father");
            $table->unsignedBigInteger('nationality_father_id');
            $table->unsignedBigInteger('blood_type_father_id');
            $table->unsignedBigInteger('religion_father_id');
            $table->string("address_father");

            // Mother Information's
            $table->string("mother_name");
            $table->string("national_id_mother");
            $table->string("passport_id_mother");
            $table->string("phone_mother");
            $table->unsignedBigInteger('nationality_mother_id');
            $table->unsignedBigInteger('blood_type_mother_id');
            $table->unsignedBigInteger('religion_mother_id');
            $table->string("address_mother");
            $table->timestamps();

            // Foreign Key Father
           $table->foreign("nationality_father_id")->references("id")->on("nationalities")->onDelete("cascade");
           $table->foreign("blood_type_father_id")->references("id")->on("blood_types")->onDelete("cascade");
           $table->foreign("religion_father_id")->references("id")->on("religions")->onDelete("cascade");

            // Foreign Key Mother
            $table->foreign("nationality_mother_id")->references("id")->on("nationalities")->onDelete("cascade");
            $table->foreign("blood_type_mother_id")->references("id")->on("blood_types")->onDelete("cascade");
            $table->foreign("religion_mother_id")->references("id")->on("religions")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_parents');
    }
}
