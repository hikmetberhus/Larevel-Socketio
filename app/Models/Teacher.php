<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\TeacherEmailVerificationNotification;
use App\Notifications\AdminResetPasswordNotification as Notification;

class Teacher extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    public $table = 'teachers';

    protected $primaryKey = 'teacher_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'city',
        'organization_type',
        'education',
        'mission',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Custom password reset notification.
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notification($token));
    }

    /**
     * Send email verification notice.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new TeacherEmailVerificationNotification);
    }

    /*public function room()
    {
        return $this->hasMany(Room::class,'teacher_id');
    }*/
}
