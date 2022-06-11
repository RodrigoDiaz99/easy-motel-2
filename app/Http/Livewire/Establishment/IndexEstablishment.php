<?php

namespace App\Http\Livewire\Establishment;

use App\Models\Establishment;
use Livewire\Component;

class IndexEstablishment extends Component
{
    public $search;
    public $model;
    public $fields;
    public $relationships;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        // Definimos los campos de la tabla en los que queremos buscar
        $this->fields = ['name', 'created_at'];
        // Si queremos añadir relaciones para evitar el N+1
        $this->relationships = ['relationship'];
        //Definimos el modelo
        $this->model = Establishment::class;
    }

    public function deleteEstablishment($establishmentId)
    {
        $this->dispatchBrowserEvent('verification', ['id' => $establishmentId]);
    }

    public function storeDeleteEstablishment($establishmentId)
    {
        Establishment::destroy($establishmentId);
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
        return view('livewire.establishment.index-establishment', [
            'establishments' => empty($this->search) ? Establishment::get() : $this->query(),
        ]);
    }
}
