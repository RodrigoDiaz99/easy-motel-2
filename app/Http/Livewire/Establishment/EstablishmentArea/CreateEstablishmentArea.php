<?php

namespace App\Http\Livewire\Establishment\EstablishmentArea;

use App\Models\Establishment_area;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateEstablishmentArea extends Component
{
    public $establishment;
    public $establishmentArea = [];

    protected function rules()
    {
        return [
            'establishmentArea.name' => [
                'required', 'string',
                Rule::unique('establishment_areas', 'name')
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
                Establishment_area::create([
                    'establishments_id' => empty($this->establishment) ? null : $this->establishment,
                    'name' => $this->establishmentArea['name'],
                    'user_created_at' => Auth::id()
                ]);
            });
            
            $this->emit('establishmentAreaAdded'); // enimitmos el evento a nivel de componente y js
            $this->reset('establishmentArea'); // Receteamos el form ya que se guardo de forma satisfactoria.
            return 301; // Retornamos de manera satisfactoria el "post"
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('error');
        }
    }

    public function render()
    {
        return view('livewire.establishment.establishment-area.create-establishment-area');
    }
}
