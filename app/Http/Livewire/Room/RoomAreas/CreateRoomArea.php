<?php

namespace App\Http\Livewire\Room\RoomAreas;

use App\Models\Room_section;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateRoomArea extends Component
{
    public $establishment;
    public $roomArea = [];

    protected function rules()
    {
        return [
            'roomArea.name' => [
                'required', 'string',
                'unique:room_sections,name'
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
                Room_section::create([
                    'establishments_id' => $this->establishment,
                    'name' => $this->roomArea['name'],
                    'user_created_at' => Auth::id()
                ]);
            });

            $this->emit('RoomAreaAdded'); // enimitmos el evento a nivel de componente
            $this->reset('roomArea'); // Receteamos el form ya que se guardo de forma satisfactoria.
            return 301; // Retornamos de manera satisfactoria el "post"
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('error');
        }
    }

    public function render()
    {
        return view('livewire.room.room-areas.create-room-area');
    }
}
