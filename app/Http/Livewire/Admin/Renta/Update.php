<?php

namespace App\Http\Livewire\Admin\Renta;

use App\Models\Renta;
use App\Models\Movie;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $renta;

    public $fecharegistro;
    public $fechadevolucion;
    public $fechaentrega;
    public $movie_id;
    
    protected $rules = [
        'fecharegistro' => 'required',
        'fechadevolucion' => 'required',
        'fechaentrega' => 'required',
        'movie_id' => 'required',        
    ];

    public function mount(Renta $Renta){
        $this->renta = $Renta;
        $this->fecharegistro = $this->renta->fecharegistro;
        $this->fechadevolucion = $this->renta->fechadevolucion;
        $this->fechaentrega = $this->renta->fechaentrega;
        $this->movie_id = $this->renta->movie_id;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Renta') ]) ]);
        
        $this->renta->update([
            'fecharegistro' => $this->fecharegistro,
            'fechadevolucion' => $this->fechadevolucion,
            'fechaentrega' => $this->fechaentrega,
            'movie_id' => $this->movie_id,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        $movies = Movie::all();

        return view('livewire.admin.renta.update', [
            'renta' => $this->renta, 'movies' => $movies
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Renta') ])]);
    }
}
