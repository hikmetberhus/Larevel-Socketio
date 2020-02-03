<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Classroom;
use App\Models\Exams\Exam;
use App\Models\Exams\Question;
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

        $exams = Exam::where('teacher_id',Auth::user()->teacher_id)->get('exam_id');
        $rooms = Room::where('teacher_id',Auth::user()->teacher_id)->get('room_id');

        $exam_broadcast_id = $exam_broadcast_id != null ? $exam_broadcast_id->exam_broadcast_id : null ;

        $default_room = Room::getActiveRoom()->room_id;
        $room_count = $rooms->count();
        $exam_count = $exams->count();
        $question_count = 0;
        $student_count = 0;

        foreach ($exams as $exam)
        {
            $question_count += Question::where('exam_id',$exam->exam_id)->count();
        }

        foreach ($rooms as $room)
        {
            $student_count += Classroom::where('room_id',$room->room_id)->count();
        }

        return view('dashboard', compact(
            'exam_broadcast_id',
            'default_room',
            'room_count',
            'exam_count',
            'question_count',
            'student_count'
            ));
    }
}
