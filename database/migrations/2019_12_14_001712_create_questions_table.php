<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('question_id');
            $table->unsignedInteger('exam_id');
            $table->smallInteger('sort');
            $table->string('content');
            $table->string('option_A');
            $table->string('option_B');
            $table->string('option_C');
            $table->string('option_D');
            $table->string('option_E');
            $table->string('image_path')->nullable();
            $table->string('description')->nullable();
            $table->string('right_options');
            $table->foreign('exam_id')
                ->references('exam_id')
                ->on('exams')
                ->onDelete('cascade')
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
        Schema::dropIfExists('questions');
    }
}
