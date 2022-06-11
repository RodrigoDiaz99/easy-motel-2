<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Models\Establishment_area;
use App\Models\Establishment_type;
use App\Models\Room_type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;


class EstablishmentController extends Controller
{
    public function index()
    {
        $establishments = Establishment::orderBy('id', 'ASC')->get();
         return view('establishments.index', compact('establishments'));
    }

    public function create()
    {
        $user = User::orderBy('name', 'ASC')->get();
        $establishment_type = Establishment_type::orderBy('name', 'ASC')->get();
        $establishment_area = Establishment_area::orderBy('name', 'ASC')->get();

        $room_types = Room_type::orderBy('name', 'ASC')->get();

        return view('establishments.create', compact('user', 'establishment_type', 'establishment_area', 'room_types'));
    }

    /*public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'location' => 'required',
                'capacity' => 'required',
                'establishment_areas_id' => 'required',
                'owner' => 'required',
                'establishment_types_id' => 'required',
            ]);

            $establishment = new Establishment();
            $establishment->name = $request->name;
            $establishment->location = $request->location;
            $establishment->capacity = $request->capacity;
            $establishment->establishment_areas_id = $request->establishment_areas_id;
            $establishment->owner = $request->owner;
            $establishment->establishment_types_id = $request->establishment_types_id;
            $establishment->user_created_at = Auth::user()->id;
            $establishment->user_updated_at = Auth::user()->id;

            $establishment->save();
           // return redirect()->route('establishment.index')->with('success', 'Se ha registrado un nuevo hotel');
            //    return redirect()->route('index_hotel')->json([
            //     'lSuccess' => true,
            //     'cMensaje' => '',
            //     'objeto' => $establishment,
            // ]);
        } catch (\Throwable $th) {
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $th->getMessage(),
            ]);
            //return back()->with('error', 'Contacte al administrador');
        }
        //return redirect()->route('index_hotel')->with('success', 'Se ha registrado un nuevo hotel');
    }*/

    public function edit($id)
    {
        $establishment = Establishment::findOrFail($id);
        $establishment_area = Establishment_area::orderBy('name', 'ASC')->get();

        return view('establishments.edit', compact('establishment'));
    }

    /*public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'capacity' => 'required',
            'establishment_areas_id' => 'required',
            'owner' => 'required',
            'establishment_types_id' => 'required',
        ]);

        try {
            $establishment = establishment::findOrFail($id);
            $establishment->name = $request('name');
            $establishment->location = $request('location');
            $establishment->capacity = $request('capacity');
            $establishment->establishment_areas_id = $request('establishment_areas_id');
            $establishment->owner = $request->owner;
            $establishment->establishment_types_id = $request('establishment_types_id');
            $establishment->updated_at = Carbon::now();
            $establishment->user_updated_at = Auth::user()->id;
            $establishment->save();
            return json_encode(array('statusCode' => 200));
        } catch (\Throwable $th) {
            return response()->json([
                'lSuccess' => false,
                'cMensaje' => $th->getMessage(),
            ]);
        }
    }

    public function show(){

    }*/
}
