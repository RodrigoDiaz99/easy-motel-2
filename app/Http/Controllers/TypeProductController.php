<?php

namespace App\Http\Controllers;

use App\Models\Product_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type=Product_type::orderBy('id','asc')->paginate(10);
       // get();
        return view('types.index',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $tproducto = new Product_type();
            $tproducto->name = $request->name;
            $tproducto->description = $request->description;
           $tproducto->user_created_at = Auth::user()->id;
            $tproducto->user_updated_at = Auth::user()->id;
            $tproducto->save();
            return back()->with('success','Se agrego el tipo de producto de manera exitosa');
            // return redirect()->route('product.index')->with('success', 'Se ha registrado nuevo producto');
        } catch (\Throwable $th) {
            return back()->with('error','Hubo un error al agregar los datos.');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $tproducto = Product_type::findOrFail($id);
            $tproducto->name = $request->name;
            $tproducto->description = $request->description;

            $tproducto->user_updated_at = Auth::user()->id;
            $tproducto->update();
            return back()->with('updated','Se modifico el tipo de producto de manera exitosa');
            // return redirect()->route('product.index')->with('success', 'Se ha registrado nuevo producto');
        } catch (\Throwable $th) {
            return back()->with('error','No se pudo crear el registro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       try {
        $producto = Product_type::find($id);

        $producto->delete();
        return back()->with('deleted','Se elimino correctamente el registro',$id);
       } catch (\Throwable $th) {
           return back()->with('deleted','No se pudo eliminar el registro');
       }
    }
}
