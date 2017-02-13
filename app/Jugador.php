<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
     protected $table = 'jugadores';

     protected $fillable = ['apodo', 'celular'];

 	public function canjeos()
    {
        return $this->hasMany('App\Canjeo');
    }
}
