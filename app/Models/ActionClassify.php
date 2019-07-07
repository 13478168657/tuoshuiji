<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ActionClassify extends Model
{
    use SoftDeletes;
    protected $table = 'action_classify';
    public function __construct(){

    }
    public function action(){
        return $this->hasMany('App\Models\Action','classify_id');
    }
}
