<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Renta') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.renta.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Renta')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
                        <!-- Fecharegistro Input -->
            <div class='form-group'>
                <label for='input-fecharegistro' class='col-sm-2 control-label '> {{ __('Fecharegistro') }}</label>
                <input type='date' id='input-fecharegistro' wire:model.lazy='fecharegistro' class="form-control  @error('fecharegistro') is-invalid @enderror" autocomplete='on'>
                @error('fecharegistro') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Fechadevolucion Input -->
            <div class='form-group'>
                <label for='input-fechadevolucion' class='col-sm-2 control-label '> {{ __('Fechadevolucion') }}</label>
                <input type='date' id='input-fechadevolucion' wire:model.lazy='fechadevolucion' class="form-control  @error('fechadevolucion') is-invalid @enderror" autocomplete='on'>
                @error('fechadevolucion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Fechaentrega Input -->
            <div class='form-group'>
                <label for='input-fechaentrega' class='col-sm-2 control-label '> {{ __('Fechaentrega') }}</label>
                <input type='date' id='input-fechaentrega' wire:model.lazy='fechaentrega' class="form-control  @error('fechaentrega') is-invalid @enderror" autocomplete='on'>
                @error('fechaentrega') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Movie_id Input -->
            <div class='form-group'>
                <label for='input-movie_id' class='col-sm-2 control-label'> {{ __('Movie_id') }}</label>
                <select id='input-movie_id' wire:model.lazy='movie_id' class="form-control @error('movie_id') is-invalid @enderror" autocomplete='on'>
                    <option value="" disabled selected>Select a movie</option>
                    @foreach($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->nombre }}</option>
                    @endforeach
                </select>
                @error('movie_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.renta.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
