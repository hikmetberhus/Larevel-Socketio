<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Exams\Question;
use phpDocumentor\Reflection\Types\Array_;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exams\Exam;
use App\Models\Room;
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
            $exam_name = Exam::where('exam_id',$exam_id)->first();
            $exam_name = $exam_name->exam_name;
        }else{
            $sort = 1;
            $questions = null;
            $exam_name = 'İsimsiz sınav';
        }
        return view('newQuiz',compact('exam_name','exam_id','sort','questions'));
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
        $exam = Exam::where('exam_id',$id)->first();

        if ($exam->exam_name != request()->exam_name){
            Exam::where('exam_id',$id)->update(['exam_name' => request()->exam_name]);
            return response()->json([
                'success'=>'Exam successfully updated.',
            ],200);
        }else{
            return response()->json([
                'success'=>'Exam successfully redirect.',
                'count'=> $exam
            ],200);
        }

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
        $authentication = Exam::where('exam_id','=',$id)->first();

        if ($authentication->teacher_id == Auth::user()->teacher_id){

            $res = Exam::where('exam_id',$id)->delete();

            if ($res){
                return response()->json([
                    'success'=> 'Data is successfully deleted',
                ],200);
            }
        }
    }
}
