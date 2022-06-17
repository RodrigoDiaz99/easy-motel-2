@extends('layouts.app')
@section('content')
    @include('mensajes.error')
    @include('mensajes.success')
    @include('mensajes.errores')
    @include('mensajes.update')
    @include('mensajes.deleted')

    <div class="container-fluid">
        <header class="card px-2 py-4">
            <h3 class="h2">Productos</h3>
            <div class="d-flex   align-items-right">

                @if ($producttype->isEmpty())
                    <button type="button" onclick="noProductType()" class="btn btn-icon btn-secundary d-flex align-items-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        <span class="btn-inner--text">Agregar Producto</span>
                    </button>
                @else
                    <button type="button" class="btn btn-icon btn-success d-flex align-items-right" data-toggle="modal" data-target="#addProduct_firstDialog">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        <span class="btn-inner--text">Agregar Producto</span>
                    </button>
                @endif

                <button type="button" class="btn btn-icon btn-success d-flex align-items-right" data-toggle="modal" data-target="#addProductType">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Tipo de Productos</span>
                </button>
            </div>

        </header>

        <div class="card px-2 mt-4 py-4">
            <div class="row gx-2 gy-4">
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0" id="gridProductoss">
                                            <thead>
                                                <tr>
                                                    <th>Nombre Producto</th>
                                                    <th>Descripción</th>
                                                    <th>Ingredientes</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($producto as $row)
                                                    <tr>
                                                        <td>
                                                            <h6 class="text-sm">{{ $row->name }}</h6>
                                                        </td>
                                                        <td>
                                                            <h6 class="text-sm">{{ $row->description }}</h6>
                                                        </td>

                                                        <td>
                                                            @forelse ($row->ingredients as $row_ingredients)
                                                                <h6 class="text-sm">{{ $row_ingredients->name }} -
                                                                    {{ $row_ingredients->pivot->quantity }}g
                                                                </h6>
                                                            @empty
                                                                <h6 class="text-sm">No aplica</h6>
                                                            @endforelse
                                                        </td>

                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @if ($row->type == 1)
                                                                        <button type="button" class="edit_row btn btn-icon btn-warning" data-id={{ $row->id }}
                                                                            data-toggle="modal" data-target="#editProduct" title="Editar prodicto"><i
                                                                                class="fas fa-edit"></i> (Preparado)</button>
                                                                    @elseif($row->type == 2)
                                                                        <button type="button" class="btn btn-icon btn-warning" data-toggle="modal"
                                                                            data-target="#editProductRecipe" title="Editar prodicto"><i
                                                                                class="fas fa-edit"></i>(Receta)</button>
                                                                    @endif
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <form action="{{ route('product.delete', $row->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('products.extras.modals.productType')
    @include('products.extras.modals.createProduct')
    @include('products.extras.modals.createProductRecipe')
    @include('products.extras.modals.editProduct')
    @include('products.extras.modals.editProductRecipe')

    @include('products.extras.modals.createProductType')
@endsection


@section('scripts')
    <script>
        var url_product_edit = "{{ route('product.edit') }}"
        var url_product_update = "{{ route('product.update') }}"
        var token = '{{ csrf_token() }}'
        let ruta_list = "{{ route('product.list', ['establishment_id' => $establishment_id]) }}"

        $('#addIngredient').on('click', function () {
    var new_input = '';
    new_input += '<div class="recipt input-group input-group-alternative mb-4" id="recipt">';
    new_input += '<select class="form-control" name="currentRecipe[]" id="currentRecipe[]">';
    new_input += '<option value="">SELECCIONE TIPO</option>@foreach ($ingredients as $row)<option value="{{ $row->id }}">{{ $row->name }}</option>@endforeach </select>';
    new_input += '<input class="form-control" placeholder="Cantidad" type="text" id="usedQuantity[]" name="usedQuantity[]">';
/*     new_input += '<input class="form-control" placeholder="Disponible" type="text" id="availableQuantity[]" name="availableQuantity[]">';
 */    new_input += '<button type="button" class="removeIngredient btn btn-danger" id="removeIngredient[]"><i class="fa fa-minus-circle" aria-hidden="true"></i></button> </div>';
    $('#ingredients').append(new_input);
});
    </script>
    <script src="{{ asset('js/productos/producto.js') }}"></script>
    <script></script>
@endsection
