<?php

namespace App\Http\Controllers\Teacher;

use App\Models\ExamBroadcast;
use App\Models\Exams\Exam;
use App\Models\Exams\Question;
use App\Models\QuestionAnswer;
use App\Models\Student;
use App\Models\TempQuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivityStartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::where('teacher_id',Auth::user()->teacher_id)->get();
        $count = array();
        foreach ($exams as $exam){
            array_push($count,Question::where('exam_id',$exam->exam_id)->count());
        }

        return view('activityStart',compact('exams','count'));
    }

    /**
     * @param $exam_broadcast_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStudent($exam_broadcast_id)
    {
        $temp_question_answer = TempQuestionAnswer::where('exam_broadcast_id',$exam_broadcast_id)
            ->distinct()
            ->get('student_id');

        $students = array();

        foreach ($temp_question_answer as $temp){
            $student = Student::where('student_id',$temp->student_id)
                ->first(['name','surname','email']);

            array_push($students,$student);
        }

        return response()->json([
            'success' => 'OK',
            'data' => $students
        ],200);
    }

    public function activityFinish(Request $request)
    {
        $exam_finish = ExamBroadcast::where('exam_broadcast_id',$request->exam_broadcast_id)
            ->update(['is_active'=> 0]);

        if ($exam_finish)
        {
            return response()->json([
                'success' => 'OK'
            ],200);
        }
    }

    public function cloneAnswers(Request $request)
    {
        $temp_question_answer = TempQuestionAnswer::where('exam_broadcast_id',$request->exam_broadcast_id)->get();

        foreach ($temp_question_answer as $answer)
        {
            $question_answer = new QuestionAnswer;
            $question_answer->exam_broadcast_id = $answer->exam_broadcast_id;
            $question_answer->student_id = $answer->student_id;
            $question_answer->question_id = $answer->question_id;
            $question_answer->answer_given = $answer->answer_given;
            $question_answer->save();
        }

        TempQuestionAnswer::where('exam_broadcast_id',$request->exam_broadcast_id)->delete();

        return response()->json([
            'success' => 'OK'
        ],200);
    }
}
