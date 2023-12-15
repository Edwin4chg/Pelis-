<?php

namespace App\Http\Livewire\Admin\Renta;

use App\Models\Renta;
use App\Models\Movie;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Renta') ])]);
        
        Renta::create([
            'fecharegistro' => $this->fecharegistro,
            'fechadevolucion' => $this->fechadevolucion,
            'fechaentrega' => $this->fechaentrega,
            'movie_id' => $this->movie_id,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        $movies = Movie::all();
        return view('livewire.admin.renta.create' , ['movies' => $movies])
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Renta') ])]);
    }    
}
