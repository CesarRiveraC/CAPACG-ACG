<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = 'colaboradores';

    protected $fillable = [
        'Cedula', 'Direccion', 'PuestoDeTrabajo', 'LugarDeTrabajo', 'Telefono',
    ];

    public function activos()
    {
    	return $this->hasMany('App\Activo');
    }

    public function combustibles()
    {
    	return $this->hasMany('App\Combustible');
    }
}
