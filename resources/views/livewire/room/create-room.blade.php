<div class="container-fluid">
    <header class="card px-2 py-4 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('establishments.rooms.index', $establishment) }}" class="btn btn-icon btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
            </a>

            <h3 class="h2 me-3">Agregar Habitaciones</h3>
        </div>
    </header>

    {{-- Offline --}}
    <div>
        <livewire:wifi-alert>
    </div>
    {{-- Offline End --}}

    <div class="card py-3">
        <div class="border-bottom px-3">
            <h5 class="h5 mb-2">Datos de la Habitación</h5>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <div wire:loading wire:target='search'>
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <strong class="ms-2">Cargando...</strong>
            </div>
        </div>

        <form wire:loading.remove wire:target='store' class="form px-3" wire:submit.prevent="store">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Nombre Habitación</label>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span
                                    class="input-group-text @error('room.name') border border-danger text-danger @enderror"><i
                                        class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control @error('room.name') is-invalid @enderror"
                                    placeholder="Nombre"   wire:model='room.name' type="text">
                            </div>
                            @error('room.name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Precio Habitación</label>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span
                                    class="input-group-text @error('room.price') border border-danger text-danger @enderror"><i
                                        class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control @error('room.price') is-invalid @enderror"
                                    placeholder="Precio" wire:model='room.price' type="number">
                            </div>
                            @error('room.price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label>Capacidad Habitación</label>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span
                                    class="input-group-text @error('room.capacity') border border-danger text-danger @enderror"><i
                                        class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control @error('room.capacity') is-invalid @enderror"
                                    placeholder="Capacidad" wire:model='room.capacity' type="number">
                            </div>
                            @error('room.capacity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <label>Tipo Habitación</label>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addRoomTypes"
                                class="btn btn-sm btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span
                                    class="input-group-text @error('room.type') border border-danger text-danger @enderror"><i
                                        class="ni ni-zoom-split-in"></i></span>
                                <select class="form-control" wire:model=room.type>
                                    <option value="">SELECCIONE</option>
                                    @foreach ($roomTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('room.type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <label>Areas Habitación</label>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addRoomAreas"
                                class="btn btn-sm btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>

                        <div class="form-group mb-4">
                            <div class="input-group">
                                <span
                                    class="input-group-text @error('room.area') border border-danger text-danger @enderror"><i
                                        class="ni ni-zoom-split-in"></i></span>
                                <select multiple class="form-control" wire:model=room.area>
                                    @foreach ($roomSections as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('room.area')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer mb-5">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('establishments.rooms.index', $establishment) }}"
                            wire:offline.attr="disabled"
                            class="btn btn-block btn-danger d-flex justify-content-center  align-items-center mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            <span class="btn-inner--text">Cancelar</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <button type="submit" wire:offline.attr="disabled"
                            class="btn btn-block btn-success d-flex justify-content-center  align-items-center mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            <span class="btn-inner--text">Guardar Establecimiento</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @section('livewire-js')
        <script>
            Livewire.on('RoomAdded', postId => {
                Swal.fire({
                    title: 'Habitación Registrada!',
                    text: "La habitación se registro con Éxito!!",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Remplazamos la url para que el cliente no puede retroceder al form
                        @this.reset('room')
                        window.location.replace(@json(route('establishments.rooms.index', $establishment)));
                    }
                })
            })

            Livewire.on('RoomTypeAdded', postId => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Guardado!',
                    showConfirmButton: false,
                    timer: 2000
                })
            })

            Livewire.on('RoomAreaAdded', postId => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Guardado!',
                    showConfirmButton: false,
                    timer: 2000
                })
            })

            Livewire.on('Error', postId => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error :(',
                    text: 'Al parecer a surguido un error, intenta de nuevo.',
                    footer: '<a href="">Necesitas Soporte!</a>'
                })
            })
        </script>
    @endsection
</div>
