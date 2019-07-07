<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Action extends Model
{
    use SoftDeletes;
    protected  $table = 'actions';
    public function __construct(){

    }

    public function group(){
        return $this->belongsToMany('App\Models\Group');
    }

    public function actionClassify(){
        return $this->belongsTo('App\Models\ActionClassify','classify_id');
    }
}
