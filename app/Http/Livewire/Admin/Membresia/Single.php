<?php

namespace App\Http\Livewire\Admin\Membresia;

use App\Models\Membresia;
use Livewire\Component;

class Single extends Component
{
    public $membresia;

    public function mount(Membresia $membresia)
    {
        $this->membresia = $membresia;
    }

    public function delete()
    {
        $this->membresia->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Membresia')])]);
        $this->emit('membresiaDeleted');
    }

    public function render()
    {
        // Accede a la relación de usuario y obtén el nombre
        $userName = $this->membresia->user->name ?? '';

        return view('livewire.admin.membresia.single', compact('userName'))
            ->layout('admin::layouts.app');
    }
}
