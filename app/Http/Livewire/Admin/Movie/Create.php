<?php

namespace App\Http\Livewire\Admin\Movie;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Movie') ])]);
        
        Movie::create([
            'nombre' => $this->nombre,
            'director' => $this->director,
            'genero' => $this->genero,
            'artista1' => $this->artista1,
            'artista2' => $this->artista2,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.movie.create')
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Movie') ])]);
    }
}
