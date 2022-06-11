<div class="container-fluid">
    <header class="card px-2 py-4 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="h2 ms-3">Áreas de Habitaciones</h3>

            <button type="button" class="btn btn-icon btn-success d-flex align-items-center" data-bs-toggle="modal"
                data-bs-target="#addRoomAreas">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle me-1" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                <span class="btn-inner--text">Agregar Área de Habitaciones</span>
            </button>
        </div>
    </header>

    <div>
        <livewire:wifi-alert>
    </div>

    <div class="card px-2 pt-4 mb-3">
        <div class="mb-4">
            <div class="row">
                <label for="search">Buscar:</label>
                <div class="form-group col-4">
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        <input class="form-control" type="search" wire:model='search'
                            placeholder="Busca por nombre del area">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div wire:loading wire:target='search'>
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <strong class="ms-2">Cargando...</strong>
                </div>
            </div>

            <div wire:loading.remove wire:target='search' class="row gx-2 gy-4">
                <div class="table-responsive">
                    @if (isset($areas) != null)
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NOMBRE</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        FECHA CREACION</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($areas as $row)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 text-xs">{{ $row->name }}</h6>
                                        </td>

                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $row->created_at->toDateString() }}</p>
                                        </td>

                                        <td class="align-middle">

                                            <button class="btn btn-sm btn-warning" wire:click='updateRoomArea({{ $row->id }})'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>

                                            <button class="btn btn-sm btn-danger"
                                                wire:click='deleteRoomArea({{ $row->id }})'>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center mt-5">
                            <svg height="179" viewBox="0 0 315 179" width="315" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#f9f9f9" transform="translate(9 119)">
                                        <rect height="22" rx="11" width="158" x="22" y="22" />
                                        <path
                                            d="m80.5025177 0c-6.0778963 0-11.0016785 4.92486775-11.0016785 11 0 6.076468 4.9256193 11 11.0016785 11h-44.0033569c6.0778962 0 11.0016784-4.9248678 11.0016784-11l-.0037079-.2884691c-.1529508-5.94306101-5.0183567-10.7115309-10.9979705-10.7115309z" />
                                    </g>
                                    <g transform="translate(25)">
                                        <rect fill="#fff" height="175" rx="10" stroke="#eee" stroke-width="4"
                                            width="274" x="2" y="2" />
                                        <path d="m4 29h271v4h-271z" fill="#eee" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="61" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="49" y="60" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="106" y="60" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="73" y="82" />
                                        <rect fill="#fc6d26" height="4" rx="2" width="15" x="87" y="71" />
                                        <rect fill="#fc6d26" height="4" opacity=".5" rx="2" width="20" x="82" y="60" />
                                        <rect fill="#eee" height="4" rx="2" width="20" x="49" y="82" />
                                        <rect fill="#eee" height="4" rx="2" width="20" x="63" y="71" />
                                        <rect fill="#fc6d26" height="4" rx="2" width="10" x="68" y="60" />
                                        <rect fill="#eee" height="4" rx="2" width="10" x="49" y="71" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="72" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="83" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="94" />
                                        <rect fill="#fc6d26" height="4" rx="2" width="15" x="49" y="93" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="106" y="93" />
                                        <rect fill="#fc6d26" height="4" opacity=".5" rx="2" width="15" x="73" y="115" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="87" y="104" />
                                        <rect fill="#fc6d26" height="4" rx="2" width="20" x="82" y="93" />
                                        <rect fill="#fc6d26" height="4" rx="2" width="20" x="49" y="115" />
                                        <rect fill="#eee" height="4" rx="2" width="20" x="63" y="104" />
                                        <rect fill="#fc6d26" height="4" opacity=".5" rx="2" width="10" x="68" y="93" />
                                        <rect fill="#eee" height="4" rx="2" width="10" x="49" y="104" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="105" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="116" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="127" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="49" y="126" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="106" y="126" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="73" y="148" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="87" y="137" />
                                        <rect fill="#fc6d26" height="4" rx="2" width="20" x="82" y="126" />
                                        <rect fill="#eee" height="4" rx="2" width="20" x="49" y="148" />
                                        <rect fill="#eee" height="4" rx="2" width="20" x="63" y="137" />
                                        <rect fill="#fc6d26" height="4" opacity=".5" rx="2" width="10" x="68" y="126" />
                                        <rect fill="#eee" height="4" rx="2" width="10" x="49" y="137" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="138" />
                                        <rect fill="#b5a7dd" height="2" rx="1" width="6" x="34" y="149" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="60" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="172" y="59" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="229" y="59" />
                                        <rect fill="#6b4fbb" height="4" opacity=".5" rx="2" width="15" x="196" y="81" />
                                        <rect fill="#6b4fbb" height="4" rx="2" width="15" x="210" y="70" />
                                        <rect fill="#6b4fbb" height="4" opacity=".5" rx="2" width="20" x="205" y="59" />
                                        <rect fill="#6b4fbb" height="4" rx="2" width="20" x="172" y="81" />
                                        <rect fill="#eee" height="4" rx="2" width="20" x="186" y="70" />
                                        <rect fill="#6b4fbb" height="4" rx="2" width="10" x="191" y="59" />
                                        <rect fill="#eee" height="4" rx="2" width="10" x="172" y="70" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="71" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="82" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="93" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="172" y="92" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="215" y="81" />
                                        <rect fill="#6b4fbb" height="4" opacity=".5" rx="2" width="15" x="196"
                                            y="114" />
                                        <rect fill="#6b4fbb" height="4" rx="2" width="15" x="186" y="103" />
                                        <rect fill="#6b4fbb" height="4" rx="2" width="20" x="205" y="92" />
                                        <g fill="#eee">
                                            <rect height="4" rx="2" width="20" x="172" y="114" />
                                            <rect height="4" rx="2" width="10" x="191" y="92" />
                                            <rect height="4" rx="2" width="10" x="172" y="103" />
                                            <rect height="4" rx="2" width="10" x="205" y="103" />
                                            <rect height="4" rx="2" width="10" x="219" y="103" />
                                            <rect height="4" rx="2" width="10" x="234" y="81" />
                                        </g>
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="104" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="115" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="126" />
                                        <rect fill="#6b4fbb" height="4" rx="2" width="15" x="172" y="125" />
                                        <rect fill="#eee" height="4" rx="2" width="15" x="196" y="147" />
                                        <rect fill="#6b4fbb" height="4" opacity=".5" rx="2" width="15" x="210"
                                            y="136" />
                                        <rect fill="#eee" height="4" rx="2" width="20" x="172" y="147" />
                                        <rect fill="#6b4fbb" height="4" rx="2" width="20" x="186" y="136" />
                                        <rect fill="#eee" height="4" rx="2" width="10" x="191" y="125" />
                                        <rect fill="#eee" height="4" rx="2" width="10" x="229" y="136" />
                                        <rect fill="#eee" height="4" rx="2" width="10" x="172" y="136" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="137" />
                                        <rect fill="#fde5d8" height="2" rx="1" width="6" x="157" y="148" />
                                    </g>
                                    <g fill-rule="nonzero">
                                        <g transform="translate(0 48)">
                                            <path
                                                d="m27.9344336 2.77695799 17.2380297 28.56856761c2.2986878 3.8095349-.4637072 8.6544744-4.9345126 8.6544744h-34.47588685c-4.47091179 0-7.23322342-4.8449395-4.9344896-8.6544744l17.23789165-28.56856761c2.2341082-3.70261065 7.6348595-3.70261065 9.8689677 0z"
                                                fill="#6b4fbb" />
                                            <path d="m23 5.716-17.238 28.568h34.476z" fill="#fff" />
                                            <path
                                                d="m22.9998922 27.1396048c1.5886864 0 2.8766535 1.2794665 2.8766535 2.8578656 0 1.5783992-1.2878808 2.8578656-2.8765959 2.8578656-1.5886864 0-2.876596-1.2794664-2.876596-2.8578656 0-1.5783991 1.287852-2.8578656 2.8765384-2.8578656zm0-14.2893279c1.9717883 0 3.3703394 1.8479266 2.9020931 3.6893344l-.1022735.3245092-2.7998196 10.2754843-2.7998483-10.2754843c-.7330717-1.9421197.7120438-4.0138436 2.7998483-4.0138436z"
                                                fill="#6b4fbb" />
                                        </g>
                                        <g transform="translate(277 111)">
                                            <path
                                                d="m23.0762712 2.29099034 14.2401116 23.56906826c1.898916 3.1428663-.3830626 7.1399414-4.0763366 7.1399414h-28.48008041c-3.69336191 0-5.97527152-3.9970751-4.0763175-7.1399414l14.23999741-23.56906826c1.8455677-3.05465379 6.3070579-3.05465379 8.1526255 0z"
                                                fill="#fc6d26" />
                                            <path d="m19 4-14 24h28z" fill="#fff" />
                                            <path
                                                d="m18.49995 22c1.3807 0 2.50005 1.11925 2.50005 2.5s-1.119275 2.5-2.5 2.5c-1.3807 0-2.5-1.11925-2.5-2.5s1.11925-2.5 2.49995-2.5zm.0000619-12c1.6470392 0 2.815252 1.5518658 2.4241249 3.0982572l-.0854293.2725188-2.3386956 8.629224-2.3387195-8.629224c-.6123364-1.630968.5947717-3.370776 2.3387195-3.370776z"
                                                fill="#fc6d26" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="text-center mt-3">
                            <strong class="h4 text-danger">NO HAY AREA DE HABITACIONES PARA MOSTRAR</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @section('livewire-js')
        <script>
            Livewire.on('updateRoomArea', postId => {
                $('#editRoomAreas').modal('show');
            })

            Livewire.on('RoomAreaAdded', postId => {
                Swal.fire(
                    'Área Guardada',
                    'Se Guardo con Éxito!',
                    'success'
                )
            })

            Livewire.on('RoomAreaUpdated', postId => {
                Swal.fire(
                    'Área Actualizada',
                    'Se Actualizada con Éxito!',
                    'success'
                )
            })

            Livewire.on('error', postId => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error :(',
                    text: 'Al parecer a surguido un error, intenta de nuevo.',
                    footer: '<a href="">Necesitas Soporte!</a>'
                })
            })
        </script>
    @endsection

    <script>
        window.addEventListener('verification', event => {
            Swal.fire({
                title: 'Deseas eliminarlo?',
                text: "Esta acción no podrá recuperarse!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.storeDeleteRoom(event.detail.id)
                    Swal.fire(
                        'Eliminado!',
                        'Eliminación Satisfactoria ',
                        'success'
                    )
                }
            })
        })
    </script>
</div>
