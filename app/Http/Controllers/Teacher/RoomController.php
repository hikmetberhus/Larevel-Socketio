<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::where('teacher_id',Auth::user()->teacher_id)->get();

        return view('room',compact('rooms'));
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

        $room = new Room;
        $room->room_id = Str::random(8);
        $room->room_name = $request->value;
        $room->is_default = $room->isDefault();

        if ($room->save()){
            return response()->json([
                'success'=> 'Data is successfully added',
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
        $authentication = Room::where('room_id',$id)->first();

        if ($authentication->teacher_id == Auth::user()->teacher_id){

            if ($authentication->is_default == 1){
                return response()->json([
                    'success'=> 'error',
                    'message'=> 'Varsayılan sınıf silinemez!'
                ],200);

            }else if (Room::where('room_id',$id)->delete()){
                return response()->json([
                    'success'=> 'Data is successfully deleted',
                ],200);
            }
        }
    }
}
