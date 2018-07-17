<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disco extends Model
{
    protected $table = "disco";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'caracteristica',
    ];


    public function cantantes()
    {
        return $this->belongsToMany('\App\Cantante', 'cantante_disco', 'disco_id', 'cantante_id');
    }
}
