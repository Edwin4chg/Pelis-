<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecharegistro',
        'fechadevolucion',
        'fechaentrega',
        'movie_id', // Mantenemos el nombre del campo de relación con la película según la clave primaria en la tabla movies
    ];

    // Relación con la película
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}
