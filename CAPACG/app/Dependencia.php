<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $fillable = [
        'Dependencia',
    ];

    public function activo()
    {
    	return $this->hasOne('App\Activo');
    }
}
