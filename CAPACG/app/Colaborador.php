<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    //

    public function activos()
    {
    	return $this->hasMany('App\Activo');
    }

    public function combustibles()
    {
    	return $this->hasMany('App\Combustible');
    }
}
