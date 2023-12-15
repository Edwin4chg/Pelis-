<?php

namespace App\Http\Livewire\Admin\Membresia;

use App\Models\Membresia;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $membresia;

    public $iduser;
    public $fechaexpedicion;
    public $fechaexpiracion;
    
    protected $rules = [
        'iduser' => 'required',
        'fechaexpedicion' => 'required',
        'fechaexpiracion' => 'required',        
    ];

    public function mount(Membresia $Membresia){
        $this->membresia = $Membresia;
        $this->iduser = $this->membresia->iduser;
        $this->fechaexpedicion = $this->membresia->fechaexpedicion;
        $this->fechaexpiracion = $this->membresia->fechaexpiracion;        
    }

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function update()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('UpdatedMessage', ['name' => __('Membresia') ]) ]);
        
        $this->membresia->update([
            'iduser' => $this->iduser,
            'fechaexpedicion' => $this->fechaexpedicion,
            'fechaexpiracion' => $this->fechaexpiracion,
            'user_id' => auth()->id(),
        ]);
    }

    public function render()
    {
        $users = User::all();
        
        return view('livewire.admin.membresia.update', [
            'membresia' => $this->membresia, 'users' => $users
        ])->layout('admin::layouts.app', ['title' => __('UpdateTitle', ['name' => __('Membresia') ])]);
    }

}
