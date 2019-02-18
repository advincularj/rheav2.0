<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaternalGuideCategory extends Model
{
    protected $table = 'maternal_guide_categories';

//    protected $fillable = ['name', 'sub_category_id'];
    public $primaryKey ='id';

    public function maternalGuides()
    {
        return $this->hasMany('App\MaternalGuide', 'id');
    }
}
