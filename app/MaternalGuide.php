<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaternalGuide extends Model
{
    public $table = 'maternal_guides';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\MaternalGuideCategory');
    }
}
