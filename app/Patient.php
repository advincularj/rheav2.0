<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Mail;


class Patient extends Model
{

    public $timestamps = false;

    protected $fillable = ['patient_id', 'doctor_id'];

    public function patient(){
        return $this->belongsTo('App\User', 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo('App\User', 'doctor_id');
    }



}
