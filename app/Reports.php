<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    // Table Name
    protected $table = 'reports';
    // Primary Key
    public $primaryKey ='reportID';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
