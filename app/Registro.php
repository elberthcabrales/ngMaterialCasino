<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registro';

 	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
