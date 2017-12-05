<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores';
    protected $fillable = [
        'Sector',
    ];

    public function activo()
    {
    	return $this->hasOne('App\Activo');
    }
    public function sector()
    {
    	return $this->hasOne('App\Sector');
    }
}
