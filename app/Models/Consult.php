<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Consult extends Model
{
    use SoftDeletes;
    protected $table = 'consult';
}