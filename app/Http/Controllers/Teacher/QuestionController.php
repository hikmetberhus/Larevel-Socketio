<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Support\Facades\Auth;
use App\Models\Exams\Exam;
use App\Models\Exams\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $sort = Question::where('exam_id','=',$request->exam_id)->get();

        $question = new Question;
        $question->exam_id = $request->exam_id;
        $question->sort = count($sort) + 1;
        $question->content = $request->question_content;
        $question->option_A = $request->option_A;
        $question->option_B = $request->option_B;
        $question->option_C = $request->option_C;
        $question->option_D = $request->option_D;
        $question->option_E = $request->option_E;
        $question->description = $request->description;
        $question->right_options = $request->right_options;

        if($question->save()){
            return response()->json([
                        'success'=> 'Data is successfully added',
                        'count'=> count($sort)+1,
                        'question_id'=> $question->id,
                        'exam_id'=> $request->exam_id
                    ]);
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
    public function destroy($exam_id,$id)
    {
        $authentication = Exam::where('exam_id','=',$exam_id)->first();

        if($authentication->teacher_id == Auth::user()->teacher_id){
           $question = Question::where([
                ['exam_id', '=', $exam_id],
                ['question_id', '=', $id]
            ])->first();
           $questions = Question::where('exam_id',$exam_id)
               ->where('sort','>',$question->sort)
               ->get();
           foreach ($questions as $row){
               Question::where('question_id',$row->question_id)
                   ->update(['sort' => $row->sort - 1]);
           }
           Question::where([
               ['exam_id', '=', $exam_id],
               ['question_id', '=', $id]
           ])->delete();
            return response()->json([
                'success'=> 'Data is successfully deleted',
                'exam_id'=> $exam_id
            ],200);
       }
    }
}
