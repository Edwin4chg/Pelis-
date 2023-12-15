<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'iduser',
        'fechaexpedicion',
        'fechaexpiracion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }
}
