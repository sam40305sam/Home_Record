<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route("admin.home")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Charts</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Charts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route("admin.home.search","m")}}">一分</a>
                        <a class="nav-link" href="{{route("admin.home.search","H")}}">一小時</a>
                        <a class="nav-link" href="{{route("admin.home.search","D")}}">一天</a>
                        <a class="nav-link" href="{{route("admin.home.search","W")}}">一周</a>
                        <a class="nav-link" href="{{route("admin.home.search","M")}}">一個月</a>
                        <a class="nav-link" href="{{route("admin.home.search","HM")}}">半年</a>
                        <a class="nav-link" href="{{route("admin.home.search","Y")}}">一年</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{route("admin.status")}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Status
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>