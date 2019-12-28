<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->onDeletes('cascade')
                ->onUpdate('cascade');
            $table->string('room_id');
            $table->foreign('room_id')
                ->references('room_id')
                ->on('rooms')
                ->onDeletes('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
