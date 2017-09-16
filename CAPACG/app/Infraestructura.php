<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraestructura extends Model
{
    //
   

    public function activo()
    {
    	return $this->belongsTo('App\Activo');
    }
}
