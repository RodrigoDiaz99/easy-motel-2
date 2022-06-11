@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <header class="card px-2 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h2">Compras</h3>

                <a href="{{ route('shopping.create') }}" class="btn btn-icon btn-success d-flex align-items-center"
                    data-bs-toggle="modal" data-bs-target="#addProduct">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <span class="btn-inner--text">Agregar Compra</span>
                </a>
            </div>
        </header>

        <div class="card px-2 mt-4 py-4">
            <div class="row gx-2 gy-4">
                <!-- TODO: Crear tabla para mostrar todos los productos (Datatables?) -->
            </div>
        </div>
    </div>
    @include('shopping.extras.modals.createShopping')
@endsection

