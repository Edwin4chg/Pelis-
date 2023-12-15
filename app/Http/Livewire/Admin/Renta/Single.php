<?php

namespace App\Http\Livewire\Admin\Renta;

use App\Models\Renta;
use Livewire\Component;

class Single extends Component
{

    public $renta;

    public function mount(Renta $Renta){
        $this->renta = $Renta;
    }

    public function delete()
    {
        $this->renta->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Renta') ]) ]);
        $this->emit('rentaDeleted');
    }

    public function render()
    {
        $movieName = $this->renta->movie->nombre ?? '';

        return view('livewire.admin.renta.single', compact('movieName'))
            ->layout('admin::layouts.app');
    }

}
