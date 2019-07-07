<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AdSpace extends Model
{
    use SoftDeletes;
    protected $table = 'ads_space';
}
