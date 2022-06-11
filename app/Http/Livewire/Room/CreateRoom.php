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

class CreateRoom extends Component
{

    public $establishment;
    public $room = [];
    public $addShellies = false;

    protected $listeners = ['RoomTypeAdded' => '$refresh', 'RoomAreaAdded' => '$refresh'];

    public function mount()
    {
        $this->room['name'] = 'Habitacion ' . (Room::where('establishments_id', $this->establishment)->count() + 1);
    }

    protected function rules()
    {
        return [
            'room.name' => [
                'required',
                'string',
                Rule::unique('rooms', 'name')
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

    public function store()
    {
        $this->validate();
        try {
            DB::transaction(function () {
                Room::create([
                    'establishments_id' => $this->establishment,
                    'name' => $this->room['name'],
                    'room_types_id' => $this->room['type'],
                    'price' => $this->room['price'],
                    'room_capacity' => $this->room['capacity'],
                    'user_created_at' => Auth::id(),
                ]);
            });

            // Le ponemos las areas que se seleccionaron
            $room = Room::latest('id')->first();
            foreach($this->room['area'] as $area){
                $room->sections()->attach($area);
            }

            $this->emit('RoomAdded');
        } catch (Exception $th) {
            $this->dispatchBrowserEvent('Error');
        }
    }

    public function render()
    {
        return view('livewire.room.create-room', [
            'roomTypes' => Room_type::orderBy('id', 'ASC')->get(),
            'roomSections' => Room_section::orderBy('id', 'ASC')->get()
        ]);
    }
}
