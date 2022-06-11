<?php

namespace App\Http\Livewire\Establishment\EstablishmentArea;

use App\Models\Establishment_area;
use Livewire\Component;

class IndexEstablishmentArea extends Component
{
    public $establishment;

    // Buscador
    public $search;
    public $model;
    public $fields;
    public $relationships;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = ['establishmentAreaAdded' => '$refresh', 'establishmentAreaUpdated' => '$refresh'];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name', 'created_at'];
        // Si queremos añadir relaciones para evitar el N+1
        $this->relationships = ['relationship'];
        //Definimos el modelo
        $this->model = Establishment_area::class;
    }

    public function updateEstablishmentArea($establishmentAreaId){
        $this->emit('updateEstablishmentArea', $establishmentAreaId);
    }

    public function deleteEstablishment($establishmentAreaId)
    {
        $this->dispatchBrowserEvent('verification', ['id' => $establishmentAreaId]);
    }

    public function storeDeleteEstablishment($establishmentId)
    {
        Establishment_area::destroy($establishmentId);
    }

    private function query()
    {
        return $this->whereConditions()
            // Si no queremos añadir relationships lo quitamos...
            //->with($this->relationships)
            // Por ejemplo...
            ->get();
    }

    private function whereConditions()
    {
        $query = $this->model::Query();

        foreach ($this->fields as $field) {
            $query = $query->orWhere($field, 'like', '%' . $this->search . '%');
        }

        return $query;
    }


    public function render()
    {
        return view('livewire.establishment.establishment-area.index-establishment-area', [
            'areas' => empty($this->search) ? Establishment_area::all() : $this->query(),
        ]);
    }
}
