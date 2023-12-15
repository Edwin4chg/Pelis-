@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Todas las Rentas') }}</h2>
                </div>
                <div class="card-body">
                    @if($rentas->isEmpty())
                        <p>No hay rentas disponibles.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Renta ID</th>
                                    <th>Película</th>
                                    <th>Fecha de Registro</th>
                                    <th>Fecha de Devolución</th>
                                    <!-- Agrega más columnas según sea necesario -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rentas as $renta)
                                    <tr>
                                        <td>{{ $renta->id }}</td>
                                        <td>{{ $renta->movie->nombre }}</td>
                                        <td>{{ $renta->fecharegistro }}</td>
                                        <td>{{ $renta->fechadevolucion }}</td>
                                        <!-- Agrega más celdas según sea necesario -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('movie') }}" class="btn btn-secondary">Volver a Movies</a>
            </div>
        </div>
    </div>
</div>
@endsection
