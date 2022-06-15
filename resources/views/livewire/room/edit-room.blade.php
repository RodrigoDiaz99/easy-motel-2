<div class="modal fade" id="EditRooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="m-2">
                <livewire:wifi-alert>
            </div>

            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Habitación</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div wire:loading wire:target='search'>
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <strong class="ms-2">Cargando...</strong>
                </div>
            </div>

            <form wire:loading.remove wire:target='update' wire:submit.prevent='update'>
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
                                        placeholder="Nombre" readonly wire:model='room.name' type="text">
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
                            <label>Tipo Habitación</label>
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
                            <label>Areas Habitación</label>
                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('room.area') border border-danger text-danger @enderror"><i
                                            class="ni ni-zoom-split-in"></i></span>
                                    <select multiple class="form-control" wire:model=room.area>
                                        @foreach ($roomTypes as $area)
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" wire:offline.attr="disabled" class="btn btn-warning"
                        data-bs-dismiss="modal"><strong>Editar</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
