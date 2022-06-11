<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use App\Models\Room_section;
use Exception;
use App\Models\Room_type;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EditRoom extends Component
{
    public $establishment;

    public $room = [];
    public $roomData;

    protected $listeners = ['editRoom' => 'getRoomId'];

    public function getRoomId($room)
    {
        $this->roomData = Room::where('id', $room)->first();

        $this->room['name'] = $this->roomData->name;
        $this->room['price'] = $this->roomData->price;
        $this->room['capacity'] = $this->roomData->room_capacity;
        $this->room['type'] = $this->roomData->room_types_id;
        $this->room['area'] = $this->roomData->section_rooms_id;
    }

    protected function rules()
    {
        return [
            'room.name' => [
                'required',
                'string',
                Rule::unique('rooms', 'name')->ignore($this->roomData->id)
            ],
            'room.price' => 'required|numeric',
            'room.capacity' => 'required|integer',
            'room.type' => 'required|integer',
            'room.area' => 'required|array',
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
                Room::create([
                    'establishments_id' => $this->establishment,
                    'name' => $this->room['name'],
                    'room_types_id' => $this->room['type'],
                    'price' => $this->room['price'],
                    'shellies_id' => 1,
                    'room_sections_id' => 1, // TODO: CAMBIAR A UNA RELACION MUCHOS A MUCHOS CON LA INTENCION DE HACER MAS FACIL SU MANEJO
                    'room_capacity' => $this->room['capacity'],
                    'user_created_at' => Auth::id(),
                ]);
            });
            $this->emit('addRoom');
            $this->dispatchBrowserEvent('store-success'); // emitimos el evento a nivel de navegador
            $this->reset(); // Receteamos el form ya que se guardo de forma satisfactoria.
            return 301; // Retornamos de manera satisfactoria el "post"
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('store-error');
        }
    }

    public function render()
    {
        return view('livewire.room.edit-room', [
            'roomTypes' => Room_type::orderBy('id', 'ASC')->get(),
            'roomSections' => Room_section::orderBy('id', 'ASC')->get()
        ]);
    }
}
