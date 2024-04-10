<!-- Start::app-sidebar -->
<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="/" class="header-logo">
            <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo"
                class="desktop-logo">
            <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo"
                class="toggle-logo">
            <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo"
                class="desktop-dark">
            <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo"
                class="toggle-dark">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">{{ __('Menú Principal') }}</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bxs-user-circle side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('Entidades') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">{{ __('Entidades') }}</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('person-type-create') }}" class="side-menu__item">{{ __('Crear') }}</a>
                            <a href="{{ route('person-type-index') }}" class="side-menu__item">{{ __('Listar') }}</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-user side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('Clientes') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">{{ __('Clientes') }}</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('client-create') }}" class="side-menu__item">{{ __('Crear') }}</a>
                            <a href="{{ route('client-index') }}" class="side-menu__item">{{ __('Listar') }}</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
                @can('viewany', \App\Models\Order::class)
                    <!-- Start::slide -->
                    <li class="slide has-sub">
                        <a href="javascript:void(0);" class="side-menu__item">
                            <i class="bx bx-book-content side-menu__icon"></i>
                            <span class="side-menu__label">{{ __('Ordenes') }}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1">
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{ __('Ordenes') }}</a>
                            </li>
                            <li class="slide">
                                <a href="{{ route('order-create') }}" class="side-menu__item">Crear</a>
                                <a href="{{ route('order-index') }}" class="side-menu__item">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End::slide -->
                @endcan
                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-book-contnt side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('Vehículos') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">{{ __('Vehículos') }}</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('vehicle-create') }}" class="side-menu__item">Crear</a>
                            <a href="{{ route('vehicle-index') }}" class="side-menu__item">Listar</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-book-contnt side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('Almacenes') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">{{ __('Almacenes') }}</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('warehouse-create') }}" class="side-menu__item">Crear</a>
                            <a href="{{ route('warehouse-index') }}" class="side-menu__item">Listar</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="bx bx-book-contnt side-menu__icon"></i>
                        <span class="side-menu__label">{{ __('Usuarios') }}</span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">{{ __('Usuarios') }}</a>
                        </li>
                        <li class="slide">
                            <a href="{{ route('user-create') }}" class="side-menu__item">Crear</a>
                            <a href="{{ route('user-index') }}" class="side-menu__item">Listar</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
<!-- End::app-sidebar -->
