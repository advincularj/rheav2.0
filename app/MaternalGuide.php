<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MaternalGuide extends Model
{
    use SoftDeletes;

    public $table = 'maternal_guides';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    // fillable
    protected $fillable = ['title', 'description'];
    // deleted_at
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\MaternalGuideCategory');
    }
}
