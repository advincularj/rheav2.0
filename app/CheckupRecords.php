<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckupRecords extends Model
{

    use SoftDeletes;
    protected $table = 'checkup_records';

    protected $dates = ['deleted_at'];

    protected $fillable =[
        'ieFindings',
        'bloodPressure',
        'height',
        'weight',
        'heartTones',
        'AOG',
        'weightGain',
        'doctorid',
        'userid'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'userid');
    }
    public function doctors()
    {
        return $this->belongsTo('App\User', 'doctorid');
    }
}
