<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; // Asegúrate de importar el modelo Movie

class MovieController extends Controller
{
    public function showStore()
    {
        $movies = Movie::all();

        return view('movie', compact('movies'));
    }

    // Otros métodos según sea necesario (create, store, edit, update, destroy, etc.)
}
