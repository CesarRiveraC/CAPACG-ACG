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
    
    public function scopeBuscar($query, $buscar){
        if($buscar !=""){
            $query-> where([['Estado', '=', '1'], ['Placa', 'LIKE', '%' .$buscar. '%']]);
            $query-> orWhere([['Estado', '=', '1'], ['Descripcion', 'LIKE', '%' .$buscar. '%']]);
            // $query-> orWhere([['Estado', '=', '1'], ['Modelo', 'LIKE', '%' .$buscar. '%']]);
            // $query-> orWhere([['Estado', '=', '1'], ['Marca', 'LIKE', '%' .$buscar. '%']]); 
            // $query-> orWhere([['Estado', '=', '1'], ['Serie', 'LIKE', '%' .$buscar. '%']]);       
        }
    }
}
