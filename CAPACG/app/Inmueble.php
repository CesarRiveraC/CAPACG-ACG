<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Inmueble extends Model
{

    
    

    public function vehiculo()
    {
    	return $this->hasOne('App\Vehiculo');
    }

    public function activo()
    {
    	return $this->belongsTo('App\Activo');
    }
        public function scopeBuscar($query, $buscar){
            if($buscar !=""){
                
                $query-> where([['Estado', '=', '1'], ['Placa', 'LIKE', '%' .$buscar. '%']]);
                $query-> orWhere([['Estado', '=', '1'], ['Descripcion', 'LIKE', '%' .$buscar. '%']]);
              
            }
        }
}
