<div class="modal fade" id="addShellies" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="m-2">
                <livewire:wifi-alert>
            </div>

            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Shelly</h5>
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

            <form wire:loading.remove wire:target='store' wire:submit.prevent='store'>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre shelly</label>
                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('shelly.name') border border-danger text-danger @enderror"><i
                                            class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control @error('shelly.name') is-invalid @enderror"
                                        placeholder="Nombre" wire:model='shelly.name' type="text">
                                </div>
                                @error('shelly.name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Shelly ID</label>
                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('shelly.shellyId') border border-danger text-danger @enderror"><i
                                            class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control @error('shelly.shellyId') is-invalid @enderror"
                                        placeholder="Nombre" wire:model='shelly.shellyId' type="text">
                                </div>
                                @error('shelly.shellyId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Turn</label>
                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('shelly.turn') border border-danger text-danger @enderror"><i
                                            class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control @error('shelly.turn') is-invalid @enderror"
                                        placeholder="Nombre" wire:model='shelly.turn' type="text">
                                </div>
                                @error('shelly.turn')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Channel</label>
                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('shelly.channel') border border-danger text-danger @enderror"><i
                                            class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control @error('shelly.channel') is-invalid @enderror"
                                        placeholder="Nombre" wire:model='shelly.channel' type="text">
                                </div>
                                @error('shelly.channel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" wire:offline.attr="disabled" class="btn btn-success"
                        data-bs-dismiss="modal"><strong>GUARDAR</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
