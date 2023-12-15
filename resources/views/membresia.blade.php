@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Información de Membresía') }}</h2>
                </div>
                <div class="card-body">
                    <h3>Datos del Usuario</h3>
                    <p><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <!-- Agrega aquí cualquier otro dato del usuario que desees mostrar -->

                    <hr>

                    <h3>Datos de la Membresía</h3>
                    @if($membresia)
                        <p><strong>ID de Membresía:</strong> {{ $membresia->id }}</p>
                        <p><strong>Fecha de Expedición:</strong> {{ $membresia->fechaexpedicion }}</p>
                        <p><strong>Fecha de Expiración:</strong> {{ $membresia->fechaexpiracion }}</p>
                        <!-- Agrega aquí cualquier otro dato de la membresía que desees mostrar -->
                    @else
                        <p>No tienes ninguna membresía.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
