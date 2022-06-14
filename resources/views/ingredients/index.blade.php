@extends('layouts.app')
@section('content')
    @include('mensajes.error')
    @include('mensajes.success')
    @include('mensajes.errores')
    @include('mensajes.update')
    @include('mensajes.deleted')
    <div class="container-fluid">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h2">Ingredientes</h3>

                <a href="#" class="btn btn-icon btn-success d-flex align-items-center" data-toggle="modal" data-target="#addIngredient">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Agregar un ingrediente</span>
                </a>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h5">Administra los ingredientes o insumos disponibles en el establecimiento.</h3>
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
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th> Nombre Producto</th>

                                                    <th> Cantidad disponible en gramos</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ingredients as $row)
                                                    <tr>
                                                        <td>
                                                            <h6 class="text-sm">{{ $row->name }}</h6>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">{{ $row->available_quantity }}</span>
                                                        </td>

                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <a href="#" class="btn btn-icon btn-success" data-toggle="modal"
                                                                        data-url={{ route('ingredient.update', $row->id) }}
                                                                        data-quantity={{ $row->available_quantity }} data-name="{{ $row->name }}"
                                                                        data-target="#editIngredient" title="Editar Inventario"><i class="fas fa-edit"></i></a>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <form action="{{ route('product.delete', $row->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-icon btn-success"><i class="fas fa-trash"></i>
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

    @include('ingredients.extras.modals.createIngredient')
    @include('ingredients.extras.modals.editIngredient')
@endsection


@section('scripts')
    <script>
        $(function() {
            $('#editIngredient').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget);
                var button_url = button.data('url');
                var button_name = button.data('name')
                var button_quantity = button.data('quantity');
                $('#editIngredientForm').attr('action', button.data('url'));
                $('#edit_name').val(button.data('name'));
                $('#edit_quantity').val(button.data('quantity'));


                /*
                       $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#save_data').click(function() {
                    alert(button_url);
                    //we will send data and recive data fom our AjaxController
                    $.ajax({
                        url: button_url,
                        data: {
                            'name': button_name,
                            'quantity': button_quantity,
                        },
                        type: 'put',

                        success: function(response) {
                            alert(response);
                        },
                        statusCode: {
                            404: function() {
                                alert('web not found');
                            }
                        },
                        error: function(x, xs, xt) {
                            //nos dara el error si es que hay alguno
                            dd(JSON.stringify(x));
                            //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
                        }
                    });
                });*/
            });


        });
    </script>
@endsection
