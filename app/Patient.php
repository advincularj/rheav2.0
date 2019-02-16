<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = ['patient_id', 'doctor_id'];

    protected $dates = ['deleted_at'];
}
