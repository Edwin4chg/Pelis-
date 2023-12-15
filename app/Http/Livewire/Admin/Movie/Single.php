<?php

namespace App\Http\Livewire\Admin\Movie;

use App\Models\Movie;
use Livewire\Component;

class Single extends Component
{

    public $movie;

    public function mount(Movie $Movie){
        $this->movie = $Movie;
    }

    public function delete()
    {
        $this->movie->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Movie') ]) ]);
        $this->emit('movieDeleted');
    }

    public function render()
    {
        return view('livewire.admin.movie.single')
            ->layout('admin::layouts.app');
    }
}
