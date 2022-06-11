<div class="modal fade" id="editar-{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.update', $row->id) }}" method="POST">
                    {{-- <form  method="POST" id="form-product"> --}}
                    @csrf
                    {{ METHOD_FIELD('PUT') }}
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <label for="">Imagen del Producto</label>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    <input class="form-control form-control-alternative" type="file" accept="image/png, image/jpeg, image/jpg" id="path" name="path">
                                </div>
                            </div>
                        </div> --}}

                    <div class="col-md-12">
                        <label for="">Nombre Producto</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <input class="form-control form-control-alternative" value="{{ $row->name }}"
                                    placeholder="Nombre tipo producto" type="text" id="name" name="name"
                                    value="{{ $row->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="">Tipo Producto (Familia producto)</label>
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-4">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                <select class="form-control" name="product_types_id" id="product_types_id">
                                    @foreach ($row->type as $r)
                                        <option value="{{ $r->id }}" selected>{{ $r->name }}</option>
                                    @endforeach

                                    @foreach ($producttype as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Establishment</label>
                    <select class="form-control" multiple name="establishments_id" id="establishments_id">
                        @foreach ($row->establishment as $esta)
                        <option value="{{ $esta->id}}" selected>{{ $esta->name }}</option>
                        @endforeach

                        {{-- @foreach ($row->establishment as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach --}}
                        @foreach ($establishments as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6">
                    <label for="">Descripción</label>
                    <div class="form-group">
                        <div class="input-group input-group-alternative mb-4">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            <textarea style="resize: none" class="form-control" name="description" id="description" cols="30" rows="4"
                                placeholder="Descripcion producto"></textarea>
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
