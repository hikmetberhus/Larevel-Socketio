<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exams\Question;
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
        return view('exams');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($exam_id = null)
    {
        if ($exam_id != null){
            $sort = Question::where('exam_id','=',$exam_id)->get();
            $sort =count($sort) + 1;
        }else{
            $sort = 1;
        }
        return view('newQuiz',compact('exam_id','sort'));
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
