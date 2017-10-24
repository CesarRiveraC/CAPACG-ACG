<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
