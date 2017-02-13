<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
   
   protected $table = 'fichas';

   public function canjeos()
   {
    return $this->belongsToMany('App\Canjeo')
      ->withTimestamps();
    }
}
