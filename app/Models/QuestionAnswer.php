<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $guarded = [];
    protected $table = "question_answers";
    public $timestamps = false;
}
