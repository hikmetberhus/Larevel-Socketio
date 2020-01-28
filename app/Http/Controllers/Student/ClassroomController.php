<?php

namespace App\Http\Controllers\Student;

use App\Models\Classroom;
use App\Models\Notification;
use App\Models\NotificationBroadcast;
use App\Models\Room;
use App\Models\Teacher;
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
        $classrooms = Classroom::where('student_id',Auth::user()->student_id)->get();

        $student_id = Auth::user()->student_id;

        $notification_broadcast = array();
        $teacher_name = array();
        $rooms = array();

        foreach ($classrooms as $classroom){

            $room = Room::where('room_id',$classroom->room_id)->first();
            $teacher = Teacher::find($room->teacher_id);
            $notifications = NotificationBroadcast::where('room_id',$room->room_id)->get();
            foreach ($notifications as $key=>$notification){
                $req = Notification::where('notification_id',$notification->notification_id)->first();
                $data_object = [
                    'room_id' => $notification->room_id,
                    'notification_id' => $notification->notification_id,
                    'content' => $req->content,
                    'subject' => $req->subject,
                    'teacher_name' =>  $teacher->name,
                    'teacher_surname' => $teacher->surname,
                    'created_at' => $req->created_at
                ];
                array_push($notification_broadcast, $data_object);
            }
            array_push($teacher_name,$teacher->name.' '.$teacher->surname);
            array_push($rooms,$room);
        }
        return view('student.examLaunch',compact('notification_broadcast','rooms','student_id'));
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
