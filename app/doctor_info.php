<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor_info extends Model
{
    protected $fillable = ['about', 'address', 'services', 'specialization', 'education', 'experience', 'user_id'];

    /*public function profile(){

        return view('doctor.doctorprofile');
    }*/
    public function user() {
        return $this->belongsTo('App\doctor_info');
    }

}
