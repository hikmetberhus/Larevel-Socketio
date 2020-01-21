<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Notification;
use App\Models\NotificationBroadcast;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::getRooms();
        $notifications = Notification::where('teacher_id',Auth::user()->teacher_id)->get();
        return view('notification',compact('rooms','notifications'));
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
        $notification = new Notification;
        $notification->teacher_id = Auth::user()->teacher_id;
        $notification->subject = $request->subject;
        $notification->content = $request->notificationContent;


        if ($notification->save())
        {
            $response_data = array();

            foreach ($request->rooms as $room)
            {
                $notification_broadcast = new NotificationBroadcast;
                $notification_broadcast->notification_id = $notification->id;
                $notification_broadcast->room_id = $room;
                $notification_broadcast->save();

                $data = [
                    'room_id'=> $room,
                    'notification_id' => $notification->id,
                    'content' => $notification->content,
                    'subject'=> $notification->subject,
                    'teacher_name'=> Auth::user()->name,
                    'teacher_surname' => Auth::user()->surname,
                    'created_at' => $notification_broadcast->created_at
                ];

                array_push($response_data,$data);
            }

            return response()->json([
                'success'=> 'Data is successfully added.',
                'data'=> json_encode($response_data)
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
        $authentication = Notification::where('notification_id',$id)->first();

        if ($authentication->teacher_id == Auth::user()->teacher_id)
        {
            if (Notification::where('notification_id',$id)->delete())
            {
                return response()->json([
                    'success'=> 'Data is successfully deleted',
                ],200);
            }
        }
    }
}
