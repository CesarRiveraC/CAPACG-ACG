<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    //

    public function vehiculo()
    {
    	return $this->belongsTo('App\Vehiculo');
    }

    public function colaborador()
    {
    	return $this->belongsTo('App\Colaborador');
    }
}
