<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConrecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conrecs', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('instructor_name');
            $table->string('other_students');
            $table->string('subject');
            $table->string('meeting_place');
            $table->string('message');
            $table->string('day');
            $table->string('part_of_the_day');
            $table->string('time');
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
        Schema::dropIfExists('conrecs');
    }
}
