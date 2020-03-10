<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Active extends Model
{
    use SoftDeletes;

    protected $table = 'active';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['start_date', 'end_date', 'start_hour', 'end_hour', 'minium_period'];
}
