<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PregnancyDiaries extends Model
{
    use SoftDeletes;
    protected $table = 'pregnancy_diaries';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'body',
        'cover_image',

    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
