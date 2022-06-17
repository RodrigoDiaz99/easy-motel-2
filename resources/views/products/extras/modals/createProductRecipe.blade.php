<div class="modal fade" id="addProductRecipe" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Producto (receta)<h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.storeRecipe', ['establishment_id' => $establishment_id]) }}" method="POST">
                    @csrf


                    <div class="col-md-12">
                        <label for="">Nombre Producto</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control form-control-alternative" placeholder="Nombre tipo producto" type="text" id="name" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Tipo Producto (Familia producto)</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <select class="form-control" name="product_types_id" id="product_types_id">
                                    <option value="">SELECCIONE TIPO</option>
                                    @foreach ($producttype as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Descripción</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control form-control-alternative" placeholder="Nombre tipo producto" type="text" id="description"
                                    name="description">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="">Ingredientes</label>

                        <div class="form-group" id="ingredients">
                            <div class="recipe input-group input-group-alternative mb-4" id="recipe">
                                <select class="form-control" index='0' name="currentRecipe[]" id="currentRecipe[]">
                                    <option value="">SELECCIONE TIPO</option>
                                    @foreach ($ingredients as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <input class="form-control" placeholder="Cantidad" type="text" id="usedQuantity[]" name="usedQuantity[]">
{{--                                 <input class="form-control" placeholder="Disponible" type="text" id="availableQuantity[]" name="availableQuantity[]">
 --}}                                <button type="button" class="btn btn-danger" disabled><i class="fa fa-minus-circle" aria-hidden="true"></i>
                                </button> </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <button type="button" class="btn btn-success" id="addIngredient"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </button>


                    </div>
            </div>

            <div class="modal-footer">
                <button  type="button"   data-dismiss="modal" aria-label="Close" class="btn btn-danger " data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success"><strong>GUARDAR</strong></button>
            </div>
            </form>
        </div>

    </div>
</div>
