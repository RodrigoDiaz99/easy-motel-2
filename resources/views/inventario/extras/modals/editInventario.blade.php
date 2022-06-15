<div class="modal fade" id="editar-{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel"">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Inventario</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>            </div>
            <div class="modal-body">
                <form action="{{route('inventory.update',$row->id)}}" method="POST">
                    @csrf
                    {{@method_field('PUT')}}
                {{-- <form action="" id="form-inventory"> --}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Cantidad</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control form-control-alternative" type="number" id="quantity"
                                        name="quantity" value="{{$row->quantity}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Producto</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <select class="form-control" name="products_id" id="products_id">
                                        @foreach ($row->product as $r)
                                        <option value="{{$r->id}}" selected>{{$r->name}}</option>
                                        @endforeach
                                        {{-- <option value="{{$row->product->first()->id}}" selected>{{$row->product->first()->name}}</option> --}}
                                        @foreach ($producto as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Precio de Compra</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control form-control-alternative"
                                        placeholder="Nombre tipo producto" value="{{$row->purchase_price}}" type="number" id="purchase_price"
                                        name="purchase_price">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="">Precio de Venta</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control form-control-alternative"
                                        placeholder="Nombre tipo producto" type="number" id="sale_price"
                                        name="sale_price" value="{{$row->sale_price}}">
                                </div>
                         </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success"
                        id="btnGuardarInventario"><strong>GUARDAR</strong></button>
                </div>
            </form>


            </div>

        </div>
    </div>
</div>
