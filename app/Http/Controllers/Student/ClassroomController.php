<?php

namespace App\Http\Controllers\Student;

use App\Models\Classroom;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (Room::where('room_id',$request->value)->count() != 0)
        {
            $classroom = new Classroom;
            $classroom -> student_id = Auth::user()->student_id;
            $classroom -> room_id = $request->value;

            if ($classroom->save())
            {
                return response()->json([
                    'success'=> 'OK',
                    'message' => 'Data is successfully added.'
                ]);
            }
        }
        return response()->json([
            'success'=> 'ERROR',
            'message' => 'Hatalı sınıf kodu girdiniz.'
        ]);

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
        Classroom::where('student_id',Auth::user()->student_id)
            ->where('room_id',$id)
            ->delete();

        return response()->json([
            'success'=> 'Data is successfully deleted',
        ],200);


    }
}
