<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamBroadcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_broadcasts', function (Blueprint $table) {
            $table->increments('exam_broadcast_id');
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')
                ->references('teacher_id')
                ->on('teachers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('exam_source');
            $table->foreign('exam_source')
                ->references('exam_id')
                ->on('exams')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('exam_broadcasts');
    }
}
