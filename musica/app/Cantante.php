<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cantante extends Model
{
    protected $table = "cantante";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'caracteristica',
    ];
	
	public function discos()
    {
        return $this->belongsToMany('\App\Disco', 'cantante_disco', 'cantante_id', 'disco_id');
    }    
}
