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
    protected $fillable = ['address', 'number', 'edod', 'allergies', 'bloodtype', 'clinic', 'doctor', 'user_id'];


    public function user() {
        return $this->belongsTo('App\userprofile');
    }

}
