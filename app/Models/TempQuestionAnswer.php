<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempQuestionAnswer extends Model
{
    protected $guarded = [];
    protected $table = "temp_question_answers";
    public $timestamps = false;
}
