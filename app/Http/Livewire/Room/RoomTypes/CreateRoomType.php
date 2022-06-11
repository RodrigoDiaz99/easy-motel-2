<?php

namespace App\Http\Livewire\Room\RoomTypes;

use App\Models\Room_type;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateRoomType extends Component
{
    public $roomType = [];
    public $establishment;

    protected function rules()
    {
        return [
            'roomType.name' => [
                'required', 'string',
                'unique:room_types,name'
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
                Room_type::create([
                    'establishments_id' => $this->establishment,
                    'name' => $this->roomType['name'],
                    'user_created_at' => Auth::id()
                ]);
            });

            $this->emit('RoomTypeAdded'); // enimitmos el evento a nivel de componente
            $this->reset('roomType'); // Receteamos el form ya que se guardo de forma satisfactoria.
            return 301; // Retornamos de manera satisfactoria el "post"
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('store-error');
        }
    }

    public function render()
    {
        return view('livewire.room.room-types.create-room-type');
    }
}
