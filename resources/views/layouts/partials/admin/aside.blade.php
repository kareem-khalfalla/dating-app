<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">{{ __('dashboard.Core') }}</div>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    {{ __('dashboard.Dashboard') }}
                </a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    {{ __('dashboard.Pages') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-parent="#sidenavAccordion">
                    <a class="nav-link" href="{{ route('admin.users') }}">{{ __('dashboard.users') }}</a>
                    <a class="nav-link" href="{{ route('admin.users.create') }}">{{ __('dashboard.Add user') }}</a>
                    <a class="nav-link" href="{{ route('admin.reports') }}">{{ __('dashboard.reports') }}</a>
                </div>

            </div>
        </div>

    </nav>
</div>
