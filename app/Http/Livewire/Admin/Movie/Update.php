<?php

namespace App\Http\Livewire\Admin\Movie;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $movie;

    public $nombre;
    public $director;
    public $genero;
    public $artista1;
    public $artista2;
    
    protected $rules = [
        'nombre' => 'required',
        'director' => 'required',
        'genero' => 'required',
        'artista1' => 'required',
        'artista2' => 'required',        
    ];

    public function mount(Movie $Movie){
        $this->movie = $Movie;
        $this->nombre = $this->movie->nombre;
        $this->director = $this->movie->director;
        $this->genero = $this->movie->genero;
        $this->artista1 = $this->movie->artista1;
        $this->artista2 = $this->movie->artista2;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Movie') ]) ]);
        
        $this->movie->update([
            'nombre' => $this->nombre,
            'director' => $this->director,
            'genero' => $this->genero,
            'artista1' => $this->artista1,
            'artista2' => $this->artista2,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.movie.update', [
            'movie' => $this->movie
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Movie') ])]);
    }
}
