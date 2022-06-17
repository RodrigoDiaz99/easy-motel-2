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
                <h3 class="h2">Tipo de Productos</h3>

                <button class="btn btn-icon btn-success d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#addProductType">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
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
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>

                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Tipo Producto</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Descripcion</th>

                                                    <th class="text-secondary opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($type as $row)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">

                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $row->name }}</h6>

                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $row->description }}</span>
                                                        </td>

                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <a href="{{ route('establishments.create') }}"
                                                                        class="btn btn-icon btn-success"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editar-{{ $row->id }}"
                                                                        title="Editar Inventario"><i
                                                                            class="fas fa-edit"></i></a>
                                                                    @include('types.extras.modals.editProductType')
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form action="{{ route('tipo.delete', $row->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-icon btn-success"><i
                                                                                class="fas fa-trash"></i>
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
                            <div class="d-flex justify-content-between align-items-center">
                                {{ $type->links() }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
    @include('products.extras.modals.createProductType')

@endsection


@section('scripts')

    <script src="{{ asset('js/productos/tipo_product.js') }}"></script>
@endsection

