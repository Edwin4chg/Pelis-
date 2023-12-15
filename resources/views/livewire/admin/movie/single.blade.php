<tr x-data="{ modalIsOpen : false }">
    <td class="">{{ $movie->nombre }}</td>
    <td class="">{{ $movie->director }}</td>
    <td class="">{{ $movie->genero }}</td>
    <td class="">{{ $movie->artista1 }}</td>
    <td class="">{{ $movie->artista2 }}</td>
    
    @if(getCrudConfig('Movie')->delete or getCrudConfig('Movie')->update)
        <td>

            @if(getCrudConfig('Movie')->update && hasPermission(getRouteName().'.movie.update', 1, 0, $movie))
                <a href="@route(getRouteName().'.movie.update', $movie->id)" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(getCrudConfig('Movie')->delete && hasPermission(getRouteName().'.movie.delete', 1, 0, $movie))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Movie') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Movie') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
