<?php

namespace App\Http\Livewire\Establishment;

use App\Models\Establishment;
use App\Models\Establishment_area;
use App\Models\Establishment_type;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreateEstablishment extends Component
{
    public $establishment = [];

    protected $listeners = ['establishmentAreaAdded' => '$refresh'];

    protected function rules()
    {
        return [
            'establishment.name' => 'required|string|unique:establishments,name',
            'establishment.location' => 'required|string|min:5',
            'establishment.capacity' => 'required|integer',
            'establishment.type' => 'required|numeric',
            'establishment.owner' => 'required|numeric',
            'establishment.shellyAuthKey' => 'nullable|string|min:6|max:11',
            'establishment.areas' => 'required',
            'establishment.description' => 'nullable|string|min:5',
        ];
    }

    protected function messages()
    {
        return [
            /* required */
            'establishment.name.required' => 'El campo "Nombre de establecimiento" es obligatorio.',
            'establishment.location.required' => 'El campo "Dirección Establecimiento" es obligatorio.',
            'establishment.capacity.required' => 'El campo "Capacidad" es obligatorio.',
            'establishment.areas.required' => 'El campo "Areas Establecimiento" es obligatorio.',
            'establishment.owner.required' => 'El campo "Dueño Establecimiento" es obligatorio.',
            'establishment.type.required' => 'El campo "Tipo Establecimiento" es obligatorio.',

            /* Min */
            'establishment.location.min' => 'Ingrese mínimo 5 caracteres.',
            'establishment.shellyAuthKey.min' => 'Ingrese mínimo 6 caracteres.',
            'establishment.description.min' => 'Ingrese mínimo 5 caracteres.',
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
                Establishment::create([
                    'name' => $this->establishment['name'],
                    'location' => $this->establishment['location'],
                    'capacity' => $this->establishment['capacity'],
                    'owner' => $this->establishment['owner'],
                    'establishment_types_id' => $this->establishment['type'],
                    'description' => isset($this->establishment['description']) ? $this->establishment['description'] : null,
                    'user_created_at' => Auth::id()
                ]);

                $establishmentId = Establishment::latest('id')->first();

                foreach($this->establishment['areas'] as $area){
                    Establishment_area::where('id', $area)->update([
                        'establishments_id' => $establishmentId->id
                    ]);
                }
            });

            $this->emit('establishmentAdded');
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('error');
        }
    }

    public function render()
    {
        return view('livewire.establishment.create-establishment', [
            'establishmentAreas' => Establishment_area::orderBy('name', 'ASC')->get(),
            'establishmentTypes' => Establishment_type::orderBy('name', 'ASC')->get(),
            'owners' => User::orderBy('name', 'ASC')->get(),
        ]);
    }
}
