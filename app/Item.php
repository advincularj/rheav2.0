<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $table = 'items';

    public $fillable = ['user_id', 'done'];

    public  function checklist() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function mark() {
        $this->done = $this->done ? false : true;
        $this -> save();
    }
}
