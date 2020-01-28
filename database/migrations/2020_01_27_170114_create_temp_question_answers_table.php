<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_broadcast_id');
            $table->foreign('exam_broadcast_id')
                ->references('exam_broadcast_id')
                ->on('exam_broadcasts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')
                ->references('student_id')
                ->on('students')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                ->references('question_id')
                ->on('questions')
                ->onUpdate('cascade');
            $table->string('answer_given')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_question_answers');
    }
}
