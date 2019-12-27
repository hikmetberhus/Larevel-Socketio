<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Room extends Model
{
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->teacher_id = Auth::user()->teacher_id;
    }

    public function isDefault()
    {
        return Room::where('teacher_id',$this->teacher_id)->count() == 0 ? 1 : 0;
    }

    public static function getRooms()
    {
        return Room::where('teacher_id',Auth::user()->teacher_id)->get();
    }

    public static function getActiveRoom()
    {
        return Room::where('teacher_id',Auth::user()->teacher_id)
            ->where('is_default',1)
            ->firstOrFail();
    }
}
