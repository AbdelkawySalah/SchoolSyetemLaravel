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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Name');

            $table->biginteger('Specialization_id')->unsigned();
            $table->foreign('Specialization_id')->references('id')->on('Specializations')
                                                                ->onDelete('cascade');

            $table->unsignedbiginteger('Gender_id');
            $table->foreign('Gender_id')->references('id')->on('genders')
                                                         ->onDelete('cascade');

            $table->date('Joining_Date');
            $table->text('Address');
           
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
        Schema::dropIfExists('teachers');
    }
}
