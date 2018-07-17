<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CantanteDisco extends Model
{
    protected $table = "cantante_disco";


    
     public function comments()
    {
                return $this->belongsToMany('App\Disco');


    }
}
