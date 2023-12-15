@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">{{ __('Catálogo de Películas') }}</h2>
        </div>
    </div>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->nombre }}</h5>
                        <p class="card-text"><strong>{{ __('Director:') }}</strong> {{ $movie->director }}</p>
                        <p class="card-text"><strong>{{ __('Género:') }}</strong> {{ $movie->genero }}</p>
                        <p class="card-text"><strong>{{ __('Artista 1:') }}</strong> {{ $movie->artista1 }}</p>
                        @if($movie->artista2)
                            <p class="card-text"><strong>{{ __('Artista 2:') }}</strong> {{ $movie->artista2 }}</p>
                        @endif
                        <!-- movie.blade.php -->
                        <a href="{{ route('renta.create', ['movie_id' => $movie->id]) }}" class="btn btn-primary">{{ __('Alquilar') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
