<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Movie') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.movie.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Movie')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Nombre Input -->
            <div class='form-group'>
                <label for='input-nombre' class='col-sm-2 control-label '> {{ __('Nombre') }}</label>
                <input type='text' id='input-nombre' wire:model.lazy='nombre' class="form-control  @error('nombre') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('nombre') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Director Input -->
            <div class='form-group'>
                <label for='input-director' class='col-sm-2 control-label '> {{ __('Director') }}</label>
                <input type='text' id='input-director' wire:model.lazy='director' class="form-control  @error('director') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('director') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Genero Input -->
            <div class='form-group'>
                <label for='input-genero' class='col-sm-2 control-label '> {{ __('Genero') }}</label>
                <input type='text' id='input-genero' wire:model.lazy='genero' class="form-control  @error('genero') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('genero') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Artista1 Input -->
            <div class='form-group'>
                <label for='input-artista1' class='col-sm-2 control-label '> {{ __('Artista1') }}</label>
                <input type='text' id='input-artista1' wire:model.lazy='artista1' class="form-control  @error('artista1') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('artista1') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Artista2 Input -->
            <div class='form-group'>
                <label for='input-artista2' class='col-sm-2 control-label '> {{ __('Artista2') }}</label>
                <input type='text' id='input-artista2' wire:model.lazy='artista2' class="form-control  @error('artista2') is-invalid @enderror" placeholder='' autocomplete='on'>
                @error('artista2') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.movie.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
