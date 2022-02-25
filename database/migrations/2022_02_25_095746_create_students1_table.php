<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students1', function (Blueprint $table) {
            $table->bigIncrements('id_student');
            $table->string('name_student', 100);
            $table->enum('gender', ['L', 'P']);
            $table->text('address');
            $table->timestamps();

            $table->foreign('id_lessons')->references('id_lessons')->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students1');
    }
}