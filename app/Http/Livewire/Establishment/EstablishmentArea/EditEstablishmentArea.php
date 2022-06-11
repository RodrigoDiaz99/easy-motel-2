<?php

namespace App\Http\Livewire\Establishment\EstablishmentArea;

use App\Models\Establishment_area;
use Exception;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditEstablishmentArea extends Component
{
    public $establishment;
    public $establishmentArea;
    public $establishmentAreaEdit = [];

    protected $listeners = ['updateEstablishmentArea'];

    public function updateEstablishmentArea($id){
        $this->establishmentArea = $id;
        $establishmentAreaData = Establishment_area::where('id', $this->establishmentArea)->first();
        $this->establishmentAreaEdit['name'] = $establishmentAreaData->name;
    }

    protected function rules()
    {
        return [
            'establishmentAreaEdit.name' => [
                'required', 'string',
                Rule::unique('establishment_areas', 'name')
            ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                Establishment_area::where('id', $this->establishmentArea)->update([
                    'name' => $this->establishmentAreaEdit['name'],
                    'user_updated_at' => Auth::id()
                ]);
            });

            $this->emit('establishmentAreaUpdated'); // enimitmos el evento a nivel de componente y js
            $this->reset('establishmentAreaEdit'); // Receteamos el form ya que se guardo de forma satisfactoria.
            return 301; // Retornamos de manera satisfactoria el "post"
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('error');
        }
    }

    public function render()
    {
        return view('livewire.establishment.establishment-area.edit-establishment-area');
    }
}
