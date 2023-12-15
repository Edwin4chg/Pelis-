@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Descripción de Renta') }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Renta ID:</strong> {{ $renta_id }}</p>
                    <p><strong>Película:</strong> {{ $movie->nombre }}</p>
                    <p><strong>Director:</strong> {{ $movie->director }}</p>
                    <p><strong>Género:</strong> {{ $movie->genero }}</p>
                    <p><strong>Artista 1:</strong> {{ $movie->artista1 }}</p>
                    @if($movie->artista2)
                        <p><strong>Artista 2:</strong> {{ $movie->artista2 }}</p>
                    @endif
                    <!-- Muestra aquí cualquier otra información relacionada con la renta -->
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('rentas') }}" class="btn btn-primary">Ir a Rentas</a>
                <a href="{{ route('movie') }}" class="btn btn-secondary">Volver a Movies</a>
            </div>
        </div>
    </div>
</div>
@endsection
