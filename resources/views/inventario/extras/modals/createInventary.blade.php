<div class="modal fade" id="addInventario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Inventario</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>            </div>
            <div class="modal-body">
                <form action="{{route('inventory.store')}}" method="POST">
                    @csrf
                {{-- <form action="" id="form-inventory"> --}}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Cantidad</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control form-control-alternative" type="number" id="quantity"
                                        name="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Producto</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <select class="form-control" name="products_id" id="products_id">
                                        <option value="">SELECCIONE PRODUCTO</option>
                                        @foreach ($producto as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
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
                                        placeholder="Nombre tipo producto" type="number" id="purchase_price"
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
                                        name="sale_price">
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
