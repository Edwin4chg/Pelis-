<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Renta')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Renta')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(getCrudConfig('Renta')->create && hasPermission(getRouteName().'.renta.create', 1, 0))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.renta.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Renta') ]) }}</a>
                        </div>
                        @endif
                        @if(getCrudConfig('Renta')->searchable())
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col" style='cursor: pointer' wire:click="sort('fecharegistro')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'fecharegistro') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'fecharegistro') fa-sort-amount-up ml-2 @endif'></i> {{ __('Fecharegistro') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('fechadevolucion')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'fechadevolucion') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'fechadevolucion') fa-sort-amount-up ml-2 @endif'></i> {{ __('Fechadevolucion') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('fechaentrega')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'fechaentrega') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'fechaentrega') fa-sort-amount-up ml-2 @endif'></i> {{ __('Fechaentrega') }} </th>
                            <th scope="col" style='cursor: pointer' wire:click="sort('movie_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'movie_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'movie_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Movie_id') }} </th>
                            
                            @if(getCrudConfig('Renta')->delete or getCrudConfig('Renta')->update)
                                <th scope="col">{{ __('Action') }}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rentas as $renta)
                            @livewire('admin.renta.single', [$renta], key($renta->id))
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $rentas->appends(request()->query())->links() }}
            </div>

            <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>

        </div>
    </div>
</div>
