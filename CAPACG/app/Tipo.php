<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = [
        'Tipo',
    ];

    public function activo()
    {
    	return $this->hasOne('App\Activo');
    }
}
