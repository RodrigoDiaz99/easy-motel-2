<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryStore;
use App\Models\Establishment;
use App\Models\Product;
use App\Models\Product_inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $establishments = Establishment::orderBy('id', 'ASC')->get();
        $inventario = Product_inventory::orderBy('id', 'asc')->get();
        $producto = Product::orderBy('id', 'asc')->get();
        return view('inventario.index', compact('inventario', 'establishments', 'producto'));
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
    public function store(InventoryStore $request)
    {

        try {

            $inventario = new Product_inventory();
            $inventario->quantity = $request->quantity;
            $inventario->purchase_price = $request->purchase_price;
            $inventario->sale_price = $request->sale_price;
            $inventario->products_id = $request->products_id;
            $inventario->save();
           return back()->with('success','Se guardo con exito el inventario');
        } catch (\Throwable $th) {
            return back()->with('error','Existe algun problema con su registro.');

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
    public function update(InventoryStore $request, $id)
    {
        try {

            $inventario = Product_inventory::findOrFail($id);
            $inventario->quantity = $request->quantity;
            $inventario->purchase_price = $request->purchase_price;
            $inventario->sale_price = $request->sale_price;
            $inventario->products_id = $request->products_id;
            $inventario->update();
           return back()->with('updated','Se modifico con exito el inventario');
        } catch (\Throwable $th) {
            return back()->with('error','Existe algun problema con su registro.');

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
        $inventario = Product_inventory::find($id);

               $inventario->delete();
               return back()->with('deleted','Se elimino correctamente el registro',$id);
    }
}
