{{-- Esta es la vista del menu la cual es renderizada y generada por el controlador a nivel de componente
    de livewire, para visualizar la logia de este componente podmeos irnos al path app/http/livewire al archivo con el
    mismo nombre utilizando la notacion camelcase --}}
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-2" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true"
                id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('home') }}">
                <img src="https://logosmarcas.net/wp-content/uploads/2020/12/Etsy-Simbolo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">{{ env('APP_NAME', 'Argon') }}</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('establishment-areas.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Áreas de Establecimientos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('establishments.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Todos Mis Establecimientos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('establishments.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-bell-concierge"></i>
                        </div>
                        <span class="nav-link-text ms-1">Recepción</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-danger font-weight-bolder opacity-6">Mis Hoteles</h6>
                </li>

                @forelse ($hotels as $hotel)
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-primary font-weight-bolder opacity-6">
                            {{ $hotel->name }}</h6>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('establishments.room-areas.index', $hotel->id) }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Áreas de Habitaciones</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('establishments.rooms.index', $hotel->id) }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Habitaciones</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('product.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Productos</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('tipo.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Tipos de producto</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('inventory.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Inventario</span>
                        </a>
                    </li>
                @empty
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6 text-danger">NO HAY HOTELES
                        </h6>
                    </li>
                @endforelse
                {{-- Sección Motel --}}

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-danger font-weight-bolder opacity-6">  <i class="fa-solid fa-bell-concierge"></i>
                        </i> Mis Moteles</h6>
                </li>

                @forelse ($motels as $motel)
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs text-primary font-weight-bolder opacity-6">
                            {{ $motel->name }}</h6>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('establishments.room-areas.index', $motel->id) }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Áreas de Habitaciones</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('establishments.rooms.index', $motel->id) }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Habitaciones</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('product.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Productos</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('tipo.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Tipos de producto</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('inventory.index') }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-bell-concierge"></i>
                            </div>
                            <span class="nav-link-text ms-1">Inventario</span>
                        </a>
                    </li>
                @empty
                    <li class="nav-item mt-3">
                        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6 text-danger">NO HAY MOTELES
                        </h6>
                    </li>
                @endforelse


            </ul>
        </div>
    </aside>
