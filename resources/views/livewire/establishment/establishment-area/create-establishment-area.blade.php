<div class="modal fade" id="addEstablishmentAreas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="m-2">
                <livewire:wifi-alert>
            </div>

            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Áreas de Establecimientos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

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
                        <div class="col-md-12">
                            <label>Nombre Area</label>
                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <span
                                        class="input-group-text @error('establishmentArea.name') border border-danger text-danger @enderror"><i
                                            class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control @error('establishmentArea.name') is-invalid @enderror"
                                        placeholder="Nombre" wire:model='establishmentArea.name' type="text">
                                </div>
                                @error('establishmentArea.name')
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
