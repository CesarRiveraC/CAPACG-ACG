<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    
    protected $fillable =[
        'Rol',
    ];

public function user()
{
    return $this->belongsTo(User::class);
}

}