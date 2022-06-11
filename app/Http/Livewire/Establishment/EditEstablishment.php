<?php

namespace App\Http\Livewire\Establishment;

use App\Models\Establishment_area;
use App\Models\Establishment_type;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Establishment;
use Illuminate\Validation\Rule;

class EditEstablishment extends Component
{
    public Establishment $establishmentEdit;

    public $establishment = [];

    protected $listeners = ['establishmentAreaAdded' => '$refresh'];

    // obtenerSelectPositions
    public $typePosition;
    public $areaPosition;
    public $ownerPosition;

    public function mount()
    {
        // Calculamos la posicion seleccionada del type para pasarle el value al wire:model
        $this->establishmentTypes = Establishment_type::orderBy('id', 'ASC')->get();
        foreach ($this->establishmentTypes as $position => $type) {
            if ($type->id == $this->establishmentEdit->establishment_types_id) {
                $this->typePosition = $position + 1;
            }
        }

        $this->establishmentAreas = Establishment_area::orderBy('id', 'ASC')->get();

        $this->owners = User::orderBy('id', 'ASC')->get();
        foreach ($this->owners as $position => $owner) {
            if ($owner->id == $this->establishmentEdit->owner) {
                $this->ownerPosition = $position + 1;
            }
        }

        $this->establishment['id'] = $this->establishmentEdit->id;
        $this->establishment['name'] = $this->establishmentEdit->name;
        $this->establishment['location'] = $this->establishmentEdit->location;
        $this->establishment['capacity'] = $this->establishmentEdit->capacity;
        $this->establishment['type'] = $this->typePosition;
        $this->establishment['owner'] = $this->ownerPosition;
        $this->establishment['shellyAuthKey'] = $this->establishmentEdit->shellyAuthKey;
        //$this->establishment['areas'] = $this->establishmentEdit->establishment_areas_id;
        $this->establishment['description'] = $this->establishmentEdit->description;
    }

    protected function rules()
    {
        return [
            'establishment.name' => [
                'required',
                'string',
                Rule::unique('establishments', 'name')->ignore($this->establishmentEdit->id)
            ],
            'establishment.location' => 'required|string|min:5',
            'establishment.capacity' => 'required|integer',
            'establishment.type' => 'required|numeric',
            'establishment.owner' => 'required|numeric',
            'establishment.shellyAuthKey' => 'nullable|string|min:6|max:11',
            'establishment.areas' => 'required',
            'establishment.description' => 'nullable|string',
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
                Establishment::where('id', $this->establishmentEdit->id)->update([
                    'name' => $this->establishment['name'],
                    'location' => $this->establishment['location'],
                    'capacity' => $this->establishment['capacity'],
                    'owner' => $this->establishment['owner'],
                    'establishment_types_id' => $this->establishment['type'],
                    'description' => isset($this->establishment['description']) ? $this->establishment['description'] : null,
                    'user_created_at' => Auth::id()
                ]);
            });

            $this->emit('establishmentAdded');
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('error');
        }
    }

    public function render()
    {
        return view('livewire.establishment.edit-establishment');
    }
}
