<!-- app-header -->
<header class="app-header">

<!-- Start::main-header-container -->
<div class="main-header-container container-fluid">

    <!-- Start::header-content-left -->
    <div class="header-content-left">

        <!-- Start::header-element -->
        <div class="header-element">
            <div class="horizontal-logo">
                <a href="https://cftransportes.com/" class="header-logo">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="CFTransporte logo" class="desktop-logo">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="CFTransporte logo" class="toggle-logo">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="CFTransporte logo" class="desktop-dark">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="CFTransporte logo" class="toggle-dark">
                </a>
            </div>
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element">
            <!-- Start::header-link -->
            <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
            <!-- End::header-link -->
        </div>
        <!-- End::header-element -->

    </div>
    <!-- End::header-content-left -->

    <!-- Start::header-content-right -->
    <div class="header-content-right">

        <!-- Start::header-element -->
        <div class="header-element notifications-dropdown">
            <!-- Start::header-link|dropdown-toggle -->
            <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                <i class="bx bx-bell header-link-icon"></i>
                <span class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary" id="notification-icon-badge">5</span>
            </a>
            <!-- End::header-link|dropdown-toggle -->
            <!-- Start::main-header-dropdown -->
            <div class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                <div class="p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 fs-17 fw-semibold">{{ __('Notificaciones') }}</p>
                        <span class="badge bg-secondary-transparent" id="notifiation-data">1 {{ __('Sin leer') }}</span>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <ul class="list-unstyled mb-0" id="header-notification-scroll">
                    <li class="dropdown-item">
                        <div class="d-flex align-items-start">
                             <div class="pe-2">
                                 <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i class="ti ti-gift fs-18"></i></span>
                             </div>
                             <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="mb-0 fw-semibold"><a href="notifications.html">Ejemplo</a></p>
                                    <span class="text-muted fw-normal fs-12 header-notification-text">Order No: 123456 ha sido enviada</span>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1 dropdown-item-close1"><i class="ti ti-x fs-16"></i></a>
                                </div>
                             </div>
                        </div>
                    </li>
                </ul>
                <div class="p-3 empty-header-item1 border-top">
                    <div class="d-grid">
                        <a href="notifications.html" class="btn btn-primary">{{ __('Ver todo')}}</a>
                    </div>
                </div>
                <div class="p-5 empty-item1 d-none">
                    <div class="text-center">
                        <span class="avatar avatar-xl avatar-rounded bg-secondary-transparent">
                            <i class="ri-notification-off-line fs-2"></i>
                        </span>
                        <h6 class="fw-semibold mt-3">No New Notifications</h6>
                    </div>
                </div>
            </div>
            <!-- End::main-header-dropdown -->
        </div>
        <!-- End::header-element -->

        <!-- Start::header-element -->
        <div class="header-element">
            <!-- Start::header-link|dropdown-toggle -->
            <a href="#" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <div class="d-sm-block d-none">
                        <p class="fw-semibold mb-0 lh-1">{{ \Auth::user()->name }}</p>
                        <span class="op-7 fw-normal d-block fs-11">{{ \Auth::user()->role->name }}</span>
                    </div>
                </div>
            </a>
            <!-- End::header-link|dropdown-toggle -->
            <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end" aria-labelledby="mainHeaderProfile">
                <li><a class="dropdown-item d-flex" href="profile.html"><i class="ti ti-user-circle fs-18 me-2 op-7"></i>{{ __('Perfil') }}</a></li>
                <li><a class="dropdown-item d-flex" href="mail.html"><i class="ti ti-inbox fs-18 me-2 op-7"></i>{{ __('Ajustes del sistema') }}</a></li>
                <li><a class="dropdown-item d-flex" href="{{route('logout')}}"><i class="bx bx-log-out fs-18 me-2 op-7"></i>{{ __('Cerrar sesión') }}</a></li>
            </ul>
        </div>  
        <!-- End::header-element -->


    </div>
    <!-- End::header-content-right -->

</div>
<!-- End::main-header-container -->

</header>
<!-- /app-header -->