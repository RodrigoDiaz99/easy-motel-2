<?php

namespace App\Http\Livewire\Room;

use App\Models\Establishment;
use App\Models\Room;
use Livewire\Component;

class IndexRoom extends Component
{

    public $establishmentId;

    // Buscador
    public $search;
    public $model;
    public $fields;
    public $relationships;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = ['addRoom' => '$refresh'];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name', 'created_at'];
        // Si queremos añadir relaciones para evitar el N+1
        //$this->relationships = ['rooms'];
        //Definimos el modelo
        $this->model = Room::class;
    }

    public function deleteRoom($roomId)
    {
        $this->dispatchBrowserEvent('verification', ['id' => $roomId]);
    }

    public function storeDeleteRoom($roomId)
    {
        Room::destroy($roomId);
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
        return view('livewire.room.index-room',[
            'establishment' => empty($this->search) ? Establishment::where('id', $this->establishmentId)->with('rooms')->first() : $this->query()
        ]);
    }
}
