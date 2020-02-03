<?php

namespace App\Http\Controllers\Teacher;

use App\Models\ExamBroadcast;
use App\Models\Exams\Exam;
use App\Models\Exams\Question;
use App\Models\QuestionAnswer;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = array();
        $student_counts = array();
        $question_counts  =array();

        $exam_broadcasts = ExamBroadcast::where('teacher_id',Auth::user()->teacher_id)
            ->where('is_active',0)
            ->get();

        foreach ($exam_broadcasts as $exam_broadcast)
        {
            $exam = Exam::where('exam_id',$exam_broadcast->exam_source)->first();
            $question_answer = QuestionAnswer::where('exam_broadcast_id',$exam_broadcast->exam_broadcast_id)
                ->distinct('student_id')
                ->count('student_id');

            array_push($exams,$exam);
            array_push($student_counts,$question_answer);
            array_push($question_counts,Question::where('exam_id',$exam->exam_id)->count());
        }
        return view('report',compact(
            'exam_broadcasts',
            'exams',
            'student_counts',
            'question_counts'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = array();

        $exam_broadcast = ExamBroadcast::where('exam_broadcast_id',$id)
            ->where('teacher_id',Auth::user()->teacher_id)
            ->first();

        $questions = Question::where('exam_id',$exam_broadcast->exam_source)->get();

        $question_answers = QuestionAnswer::where('exam_broadcast_id',$exam_broadcast->exam_broadcast_id)
            ->distinct()
            ->get('student_id');

        foreach ($question_answers as $question_answer)
        {
            $student = Student::where('student_id',$question_answer->student_id)->first();

            $student_answers = QuestionAnswer::where('exam_broadcast_id',$exam_broadcast->exam_broadcast_id)
                ->where('student_id',$question_answer->student_id)
                ->get();

            $answers = array();

            foreach ($student_answers as $student_answer)
            {
                $temp = [
                    'question_id' => $student_answer->question_id,
                    'answer_given' => $student_answer->answer_given
                ];

                array_push($answers,$temp);
            }

            $temp = [
                'student_id' => $question_answer->student_id,
                'name' => $student->name . ' ' . $student->surname,
                'answers' => $answers
            ];

            array_push($students,$temp);
        }

        return view('reportShow',compact(
            'students',
            'questions'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
