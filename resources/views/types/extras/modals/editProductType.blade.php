<div class="modal fade" id="editar-{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Tipo Producto</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>            </div>
            <div class="modal-body">
                <form action="{{ route('tipo.update',$row->id) }}" method="post">
                    {{-- <form id="form-tipo" action=""> --}}
                    @csrf
                    {{method_field('put')}}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Nombre Tipo Producto</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control form-control-alternative"
                                        placeholder="Nombre tipo producto" type="text" id="name" name="name" value="{{$row->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Descripcion</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control form-control-alternative"
                                        placeholder="Descripcion producto" type="text" id="description"
                                        name="description" value="{{$row->description}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success"><strong>GUARDAR</strong></button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
