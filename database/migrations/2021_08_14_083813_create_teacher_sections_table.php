<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')
                  ->onDelete('cascade');

            $table->Integer('Grade_id')->unsigned();
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
           
            $table->Integer('Classroom_id')->unsigned();
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
           
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
           
            $table->foreignId('subject_id')->references('id')->on('subjects')->onDelete('cascade');

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
        Schema::dropIfExists('teacher_sections');
    }
}
