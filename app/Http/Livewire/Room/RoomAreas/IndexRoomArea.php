<?php

namespace App\Http\Livewire\Room\RoomAreas;

use App\Models\Room_section;
use Livewire\Component;

class IndexRoomArea extends Component
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

    protected $listeners = ['RoomAreaAdded' => '$refresh', 'RoomAreaUpdated' => '$refresh'];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name', 'created_at'];
        // Si queremos añadir relaciones para evitar el N+1
        $this->relationships = ['relationship'];
        //Definimos el modelo
        $this->model = Room_section::class;
    }

    public function updateRoomArea($RoomAreaId){
        $this->emit('updateRoomArea', $RoomAreaId);
    }

    public function deleteRoomArea($RoomAreaId)
    {
        $this->dispatchBrowserEvent('verification', ['id' => $RoomAreaId]);
    }

    public function storeDeleteRoom($RoomId)
    {
        Room_section::destroy($RoomId);
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
        return view('livewire.room.room-areas.index-room-area', [
            'areas' => empty($this->search) ? Room_section::all() : $this->query()
        ]);
    }
}
