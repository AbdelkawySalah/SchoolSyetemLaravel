<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Integer('Grade_id')->unsigned();
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
           
            $table->Integer('Classroom_id')->unsigned();
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');

           

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
        Schema::dropIfExists('subjects');
    }
}
