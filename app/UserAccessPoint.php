<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccessPoint extends Model
{
    use SoftDeletes;

    protected $table = 'user_access_point';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['id_user', 'id_access_point'];

    // A una conexión le pertenece un usuario
    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
    
    // A una conexión de un usuario le pertenece un punto de acceso
    public function accessPoint() {
        return $this->belongsTo('App\AccessPoint', 'id_access_point');
    }
}
