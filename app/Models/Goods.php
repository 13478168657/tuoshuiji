<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Goods extends Model
{
    protected $table = 'goods';
    use SoftDeletes;

    public function __construction(){

    }
}
