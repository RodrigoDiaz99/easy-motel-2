<?php

namespace App\Http\Livewire;

use App\Models\Establishment;
use Livewire\Component;

class AsideMenu extends Component
{

    // Refrescamos la vista solo si se agrega un nuevo establecimiento, optimizando las renderizaciones del cliente y las peticiones al servidor
    protected $listeners = ['establishmentAdded' => '$refresh'];

    public function render()
    {
        return view('livewire.aside-menu', [
            'hotels' => Establishment::where('establishment_types_id', '1')->orderBy('id', 'ASC')->get(),
            'motels' => Establishment::where('establishment_types_id', '2')->orderBy('id', 'ASC')->get()
        ]);
    }
}
