<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id_student');
            $table->unsignedBigInteger('id_lessons');
            $table->string('name_student', 100);
            $table->enum('gender', ['L', 'P']);
            $table->text('address');
            $table->timestamps();

            $table->foreign('id_lessons')->references('id_lessons')->on('lessons');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
