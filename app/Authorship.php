<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorship extends Model
{
    public $table = 'auth';
    public $primaryKey ='id';
    protected $fillable = [
        'email',];
}
