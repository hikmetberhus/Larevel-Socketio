<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exams\Question;
use phpDocumentor\Reflection\Types\Array_;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exams\Exam;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
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

        return view('exams',compact('exams','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($exam_id = null)
    {
        if ($exam_id != null){
            $questions = Question::where('exam_id','=',$exam_id)->get();
            $sort =count($questions) + 1;
        }else{
            $sort = 1;
            $questions = null;
        }
        return view('newQuiz',compact('exam_id','sort','questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->request_type == 'ajax'){
            $exam = new Exam;
            $exam->exam_name = $request->exam_name;
            $exam->teacher_id = Auth::user()->teacher_id;
            $exam->save();
            return response()->json([
                'success'=>'Exam successfully added.',
                'exam_id'=> $exam->id
            ],200);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
