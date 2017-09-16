<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    //

    public function vehiculo()
    {
    	return $this->hasOne('App\Vehiculo');
    }

    public function activo()
    {
    	return $this->belongsTo('App\Activo');
    }
}
