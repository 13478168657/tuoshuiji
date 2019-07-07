<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ActionColumn extends Model
{
    use SoftDeletes;
    protected $table = 'action_columns';
    public function __construct(){

    }
    public function action(){
        return $this->hasMany('App\Models\Action');
    }
}
