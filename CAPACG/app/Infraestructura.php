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
}
