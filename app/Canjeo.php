<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canjeo extends Model
{
     protected $table = 'canjeos';


     public function jugador()
    {
 
        return $this->belongsTo('App\Jugador');
    }

    public function fichas()
    {
      //si le ponemos ->withTimestamps(); en la tabla pivote se guardan los valores
    return $this->belongsToMany('App\Ficha')->withPivot('cantidad_ficha', 'valor_actual')->withTimestamps();
    }

    public function user()
    {
    return $this->belongsTo('App\User');
    
    }
}
