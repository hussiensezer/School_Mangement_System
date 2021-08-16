<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("email")->unique();
            $table->string("password");
            $table->string("name");
            $table->unsignedBigInteger("specialization_id");
            $table->unsignedBigInteger("gender_id");
            $table->date("joined_date");
            $table->string("address");
            $table->string("phone");
            $table->timestamps();
            $table->foreign("specialization_id")->references("id")->on("specializations")->onDelete("cascade");
            $table->foreign("gender_id")->references("id")->on("genders")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
