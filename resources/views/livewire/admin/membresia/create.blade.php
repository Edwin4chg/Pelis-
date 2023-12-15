<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Membresia') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.membresia.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Membresia')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            <!-- Iduser Input -->
            <div class='form-group'>
                <label for='input-iduser' class='col-sm-2 control-label'> {{ __('Iduser') }}</label>
                <select id='input-iduser' wire:model.lazy='iduser' class="form-control @error('iduser') is-invalid @enderror" autocomplete='on'>
                    <option value="" disabled selected>Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('iduser') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

            <!-- Fechaexpedicion Input -->
            <div class='form-group'>
                <label for='input-fechaexpedicion' class='col-sm-2 control-label '> {{ __('Fechaexpedicion') }}</label>
                <input type='date' id='input-fechaexpedicion' wire:model.lazy='fechaexpedicion' class="form-control  @error('fechaexpedicion') is-invalid @enderror" autocomplete='on'>
                @error('fechaexpedicion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            <!-- Fechaexpiracion Input -->
            <div class='form-group'>
                <label for='input-fechaexpiracion' class='col-sm-2 control-label '> {{ __('Fechaexpiracion') }}</label>
                <input type='date' id='input-fechaexpiracion' wire:model.lazy='fechaexpiracion' class="form-control  @error('fechaexpiracion') is-invalid @enderror" autocomplete='on'>
                @error('fechaexpiracion') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.membresia.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
