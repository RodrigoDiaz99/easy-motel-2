<?php

namespace App\Http\Livewire\Shellies;

use App\Models\Shelly;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateShelly extends Component
{

    public $shelly = [];
    public $establishment;
    public $room;

    protected function rules()
    {
        return [
            'shelly.name' => [
                'required', 'string',
                'unique:shellies,name'
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                Shelly::create([
                    'establishments_id' => $this->establishment,
                    'name' => $this->shelly['name'],
                    'shelly_id' => $this->shelly['shelly_id'],
                    'turn' => $this->shelly['turn'],
                    'channel' => $this->shelly['channel'],
                    'user_created_at' => Auth::id()
                ]);
            });

            $this->emit('addShelly'); // enimitmos el evento a nivel de componente
            $this->dispatchBrowserEvent('store-success'); // emitimos el evento a nivel de navegador
            $this->reset('roomArea'); // Receteamos el form ya que se guardo de forma satisfactoria.
            return 301; // Retornamos de manera satisfactoria el "post"
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('store-error');
        }
    }
    public function render()
    {
        return view('livewire.shellies.create-shelly');
    }
}
