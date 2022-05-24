<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_classes', function (Blueprint $table) {
            $table->id("class_id");
            $table->unsignedBigInteger("teacher_id")->nullable();
            $table->string("course_code");
            $table->string("desc");
            $table->double("units");
            $table->foreign("teacher_id")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_classes');
    }
}
