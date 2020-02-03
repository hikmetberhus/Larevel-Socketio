<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Room;
use App\Models\ExamBroadcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Only Authenticated users for "teacher" guard
     * are allowed.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show Teacher Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_broadcast_id = ExamBroadcast::where('teacher_id',Auth::user()->teacher_id)
            ->where('is_active',1)
            ->first('exam_broadcast_id');

        $exam_broadcast_id = $exam_broadcast_id != null ? $exam_broadcast_id->exam_broadcast_id : null ;

        $default_room = Room::getActiveRoom()->room_id;

        return view('dashboard',compact('exam_broadcast_id','default_room'));
    }
}
