<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membresia;

class MembresiaController extends Controller
{
    public function show()
    {
        // Obtén la membresía asociada al usuario que ha iniciado sesión
        $membresia = Membresia::where('iduser', auth()->user()->id)->first();

        // Pasa la membresía a la vista
        return view('membresia', ['membresia' => $membresia]);
    }
}
