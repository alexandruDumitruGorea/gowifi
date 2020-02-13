<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Connection extends Model
{
    use SoftDeletes;

    protected $table = 'connection';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['id_access_point', 'date', 'hour', 'mac'];

    // Una conexión tiene un punto de acceso
    public function accessPoint() {
        return $this->belongsTo('App\AccessPoint', 'id_access_point');
    }
}
