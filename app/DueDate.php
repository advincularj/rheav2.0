<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DueDate extends Model
{
    use SoftDeletes;
    public $table = 'pregnancy_due_dates';
    public $timestamps = true;
    protected $dates = [
        'last_period',
        'created_at',
        'deleted_at',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
