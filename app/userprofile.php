<?php
/**
 * Created by PhpStorm.
 * User: Rae Jillian
 * Date: 2/6/2019
 * Time: 4:06 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class userprofile extends Model
{

    public $table = 'userprofiles';
    public $primaryKey = 'id';
    protected $fillable = ['address', 'number', 'edod', 'birth_date', 'allergies', 'bloodtype', 'clinic', 'doctor', 'user_id'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
