<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Renta;

class RentaController extends Controller
{
    public function create($movie_id)
    {
        // Obtén la película asociada al movie_id
        $movie = Movie::findOrFail($movie_id);

        // Calcula la fecha de devolución (10 días después de la fecha de registro)
        $fechaDevolucion = now()->addDays(10);

        // Crea la renta asociada al movie_id
        $nuevaRenta = Renta::create([
            'fecharegistro' => now(),
            'fechadevolucion' => $fechaDevolucion,
            'fechaentrega' => now(), // La fecha de entrega inicialmente se establece igual a la de registro
            'movie_id' => $movie_id,
        ]);

        // Redirige a la vista renta.blade.php pasando el ID de la renta y la película
        return view('renta', ['renta_id' => $nuevaRenta->id, 'movie' => $movie]);
    }

    public function index()
    {
        $rentas = Renta::all(); // Puedes ajustar esto según tus necesidades

        return view('rentas', compact('rentas'));
    }
}

