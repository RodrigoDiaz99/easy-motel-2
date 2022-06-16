<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStore;
use App\Models\Establishment;
use App\Models\Product;
use App\Models\Product_inventory;
use App\Models\Product_type;
use App\Models\User;
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
    public function index()
    {
        $establishments = Establishment::orderBy('id', 'asc')->get();
        $producttype = Product_type::orderBy('id', 'asc')->get();
        $productinventory = Product_inventory::orderBy('id', 'asc')->get();
        $producto = Product::orderBy('id', 'asc')->get();
        return view('products.index', compact('establishments', 'producttype', 'productinventory', 'producto'));
    }

    public function gridProductos(Request $request)
    {

        try {

            $lstProductos = Product::join('establishment', 'Product.establishment_id', '=', 'establishment.id')
                ->join('product_types','Product.product_types_id','=','product_type.id')
                ->select('Product.id', 'Product.name', 'Product.type','establishment.name','product_types.name','Product.user_created_at' )

                ->get();

            return $lstProductos;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $establishments = Establishment::orderBy('id', 'ASC')->get();
        // $producttype= ProductType::orderBy('id','asc')->get();
        // $productinventory =ProductInventory::orderBy('id','asc')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request)
    {
        try {
            $producto = new Product();
            $producto->name = $request->name;
            $producto->description = $request->description;
            $producto->establishments_id = $request->establishments_id;

            $producto->product_types_id = $request->product_types_id;
            $producto->user_created_at = Auth::user()->id;
            $producto->user_updated_at = Auth::user()->id;
            $producto->save();
            return redirect()->route('product.index')->with('success', 'Se ha registrado nuevo producto');
        } catch (\Throwable $th) {
            // return back()->with('error', 'No se pudo crear el registro');
            throw new Exception($th->getMessage());
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
            //   $producto->description = $request->description;
            $producto->establishments_id = $request->establishments_id;

            $producto->product_types_id = $request->product_types_id;
            // $producto->user_created_at = Auth::user()->id;
            $producto->user_updated_at = Auth::user()->id;
            $producto->update();
            return back()->with('updated', 'Se ha modificado el producto');
        } catch (\Throwable $th) {
            // return back()->with('error', 'No se pudo crear el registro');
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

            $producto->delete();
            return back()->with('deleted', 'Se elimino correctamente el registro', $id);
        } catch (\Throwable $th) {
            return back()->with('error', 'No se puede eliminar, probablemente esta relacionado con algun otro dato');
        }

    }
}
