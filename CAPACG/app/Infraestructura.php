<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraestructura extends Model
{
    protected $fillable = [
        'NumeroFinca', 'AreaConstruccion', 'AreaTerreno', 'AnoFabricacion',
    ];
   

    public function activo()
    {
    	return $this->belongsTo('App\Activo');
    }

    public function scopeBuscar($query, $buscar){
        if($buscar !=""){
            $query-> where([['Estado', '=', '1'], ['Placa', 'LIKE', '%' .$buscar. '%']]);
            $query-> orWhere([['Estado', '=', '1'], ['Programa', 'LIKE', '%' .$buscar. '%']]);
                    
        }
    }

    public function filtrar($query, $buscar){
        if($buscar !=""){
            $query-> where([['Estado', '=' .$buscar]]);
            // $query-> orWhere([['Estado', '=', '1'], ['Programa', 'LIKE', '%' .$buscar. '%']]);
                    
        }
    }

}
