@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __('Your Profile') }}</h2>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>{{ __('Name:') }}</strong></div>
                        <div class="col-md-8">{{ Auth::user()->name }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>{{ __('Last Name (Paterno):') }}</strong></div>
                        <div class="col-md-8">{{ Auth::user()->lastnameP }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>{{ __('Last Name (Materno):') }}</strong></div>
                        <div class="col-md-8">{{ Auth::user()->lastnameM }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>{{ __('Birthdate:') }}</strong></div>
                        <div class="col-md-8">{{ Auth::user()->fechaNacimiento }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4"><strong>{{ __('Email:') }}</strong></div>
                        <div class="col-md-8">{{ Auth::user()->email }}</div>
                    </div>

                    <!-- Puedes agregar más información del usuario según sea necesario -->

                    <div class="text-center">
                        <p class="lead">{{ __('Welcome back,') }} {{ Auth::user()->name }}!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
