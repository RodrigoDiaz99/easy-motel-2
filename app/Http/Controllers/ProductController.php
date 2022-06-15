<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStore;
use App\Models\Product;
use App\Models\Product_inventory;
use App\Models\Product_type;
use App\Models\Ingredient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($establishment_id)
    {
        $producttype = Product_type::orderBy('id', 'asc')->get();
        $productinventory = Product_inventory::orderBy('id', 'asc')->get();
        $producto = Product::orderBy('id', 'asc')->get();
        $ingredients = Ingredient::where('establishment_id', $establishment_id)->get();

        return view('products.index', compact('establishment_id', 'producttype', 'productinventory', 'producto', 'ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request, $establishment_id)
    {
        try {
            $producto = new Product();
            $producto->name = $request->name;
            $producto->description = $request->description;
            $producto->type = 1;
            $producto->establishments_id = $establishment_id;
            $producto->product_types_id = $request->product_types_id;
            $producto->save();
            return back()->with('success', 'Se ha registrado nuevo producto');
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function storeRecipt(ProductStore $request, $establishment_id)
    {
        try {
            $producto = new Product();
            $producto->name = $request->name;
            $producto->description = $request->description;
            $producto->type = 2;
            $producto->establishments_id = $establishment_id;
            $producto->product_types_id = $request->product_types_id;
            $quantity = $request->usedQuantity;
            $ingredient_id = $request->currentRecipt;
            $producto->save();
            for ($i = 0; $i < count($ingredient_id); $i++) {
                $producto->ingredients()->attach($ingredient_id[$i], ['quantity' => $quantity[$i]]);
                $ingredient = Ingredient::findOrFail($ingredient_id[$i]);
                $ingredient_quantity = $ingredient->available_quantity;
                $new_quantity = $ingredient_quantity - $quantity[$i];

                if ($new_quantity < 0) {
                    throw new Exception('Value cannot be less than zero.');
                }
                $ingredient->available_quantity = $new_quantity;
                $ingredient->save();
            }
            return back()->with('success', 'Se ha registrado nuevo producto');
        } catch (\Exception $th) {
            return back()->with(['error' => 'Error al agregar el registro, por favor, contacte a un administrador del sistema.', 'code' => $th->getMessage()]);
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
            $producto = Product::findOrFail($id);
            $producto->name = $request->name;
            $producto->establishments_id = $request->establishments_id;
            $producto->product_types_id = $request->product_types_id;
            $producto->user_updated_at = Auth::user()->id;
            $producto->update();
            return back()->with('updated', 'Se ha modificado el producto');
        } catch (\Throwable $th) {
            return back()->with('error', 'No se pudo crear el registro');
            return response()->json($producto);
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
            $producto = Product::find($id);
            if ($producto->type == '1') {
                $producto->delete();
                return back()->with('deleted', 'Se elimino correctamente el registro', $id);
            } else if ($producto->type == '2') {
                $producto->ingredients()->detach();
                $producto->delete();
                return back()->with('deleted', 'Se elimino correctamente el registro', $id);
            }
        } catch (\Throwable $th) {
            $exception = $th->getMessage();
            return back()->with(['error' => 'No se pudo eliminar el registro, por favor, contacta a un administrado del sistema.', 'code' => $exception]);
        }
    }
}
