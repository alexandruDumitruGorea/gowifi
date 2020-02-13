<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessPoint extends Model
{
    use SoftDeletes;

    protected $table = 'access_point';

    protected $hidden = ['created_at','updated_at'];

    protected $fillable = ['id_technical', 'model', 'location', 'latitude', 'longitude', 'date_register'];

    // Un punto de acceso tiene un tecnico
    public function technical() {
        return $this->belongsTo('App\User', 'id_technical');
    }
    
    // Un punto de acceso tiene varios usuarios conectados
    public function users() {
        return $this->hasMany('App\UserAccessPoint');
    }
}
