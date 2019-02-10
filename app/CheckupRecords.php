<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckupRecords extends Model
{

    protected $fillable =[
        'ieFindings',
        'bloodPressure',
        'height',
        'weight',
        'heartTones',
        'AOG',
        'weightGain'
    ];
}
