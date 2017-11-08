<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Combustible extends Model
{
    
    protected $fillable = [
        'NoVaucher', 'Monto', 'Numero', 'Fecha','Kilometraje','LitrosCombustible','FuncionarioQueHizoCompra','Dependencia','CodigoDeAccinDePlanPresupuesto',
    ];

    public function vehiculo()
    {
    	return $this->belongsTo('App\Vehiculo');
    }

    public function colaborador()
    {
    	return $this->belongsTo('App\Colaborador');
    }

    public function scopeBuscar($query, $buscar){
        if(trim($buscar) !=""){
            $query ->orWhere('Estado',"=",'1');
            $query ->orWhere('NoVaucher',"LIKE","%$buscar%");
            $query ->orWhere('Numero',"LIKE","%$buscar%");
            
        }
    }



}
