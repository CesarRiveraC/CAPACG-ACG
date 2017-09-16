<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //

    public function inmueble()
    {
    	return $this->belongsTo('App\Inmueble');
    }

    public function combustibles()
    {
    	return $this->hasMany('App\Combustible');
    }
}
