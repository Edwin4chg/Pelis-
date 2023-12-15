<?php

namespace App\Http\Livewire\Admin\Membresia;

use App\Models\Membresia;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $iduser;
    public $fechaexpedicion;
    public $fechaexpiracion;
    
    protected $rules = [
        'iduser' => 'required',
        'fechaexpedicion' => 'required',
        'fechaexpiracion' => 'required',        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Membresia') ])]);
        
        Membresia::create([
            'iduser' => $this->iduser,
            'fechaexpedicion' => $this->fechaexpedicion,
            'fechaexpiracion' => $this->fechaexpiracion,
            'user_id' => auth()->id(),
        ]);

        $this->reset();
    }

    public function render()
    {
        $users = User::all(); // Obtener todos los usuarios

        return view('livewire.admin.membresia.create', ['users' => $users])
            ->layout('admin::layouts.app', ['title' => __('CreateTitle', ['name' => __('Membresia') ])]);
    }
}
