<?php

namespace App;
//use Mail;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;

use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table = 'users';
    public $primaryKey ='id';
    protected $fillable = [
    'role_id','first_name', 'last_name', 'phone', 'email', 'password',


];
    protected static $logAttributes = ['first_name', 'last_name', 'phone', 'email', 'password'];
    protected static $logName = 'User';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function guides(){
        return $this->hasMany('App\MaternalGuide');
    }

    public function activity(){
        return $this->hasMany('App\Activity');
    }

    public static function generatePassword()
    {
        // Generate random string and encrypt it.
        return bcrypt(str_random(35));
    }

    public static function sendWelcomeEmail($user)
    {
        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);


        // Send email
        Mail::send('admin.cruddoctors.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
            $m->from('rhea.isproj2@gmail.com', 'RHEA');
            $m->to($user->email, $user->first_name, $user->last_name)->subject('Welcome to RHEA');
        });
    }

    public static function sendAddedPatientEmail($id)
    {
        // Send email
        Mail::send('doctor.email.added-patient', ['id' => $id, ], function ($m) use ($id) {
            $m->from('rhea.isproj2@gmail.com', 'RHEA');
            $m->to($id->email, $id->first_name, $id->last_name)->subject('Rhea');
        });
    }

//    public static function sendConfirmationEmail($data)
//    {
//
//        // Send email
//        Mail::send('patient.confirmation', ['user' => $data], function ($m) use ($data) {
//            $m->from('rhea.isproj2@gmail.com', 'RHEA');
//            $m->to($data->email, $data->first_name, $data->last_name)->subject('Welcome to RHEA');
//        });
//
//        return user();
//    }



    public function profile() {
        return $this->hasOne('App\User');
    }


    public function userprofile() {
        return $this->hasOne('App\userprofile', 'user_id');
    }

    public function reports(){
        return $this->hasMany('App\Report');
    }

    public function userprofiles(){
        return $this->hasMany('App\userprofile','user_id');
    }


    public function doctorprofile() {
        return $this->hasOne('App\doctor_info', 'user_id');
    }

    public function checkuprecords(){
        return $this->hasMany('App\CheckupRecords');
    }

}
