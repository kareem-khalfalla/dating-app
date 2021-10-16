<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="{{ route('welcome') }}">View Website</a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-parent="#sidenavAccordion">
                    <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
                    <a class="nav-link" href="{{ route('admin.users.create') }}">Add user</a>
                    <a class="nav-link" href="{{ route('admin.reports') }}">Reports</a>
                    <a class="nav-link" href="{{ route('admin.settings') }}">Settings</a>
                </div>
            </div>
        </div>
    </nav>
</div>
