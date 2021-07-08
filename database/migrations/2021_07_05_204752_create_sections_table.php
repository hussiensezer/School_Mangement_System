<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->tinyInteger("status");
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('classroom_id');
            $table->timestamps();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign("classroom_id")->references("id")->on("classrooms")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
