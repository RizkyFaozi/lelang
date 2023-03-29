<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light shadow" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    @if (auth()->user()->level=="admin")
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Data Table
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="datamasyarakat">Table User</a>
                            <a class="nav-link" href="databarang">Table Barang</a>
                            <a class="nav-link" href="datapetugas">Table Petugas</a>
                        </nav>
                    </div>
                    @endif
                    @if (auth()->user()->level=="petugas")
                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="Upload">Upload Barang</a>
                            <a class="nav-link" href="Statusbarang">Status Barang</a>
                            {{-- <a class="nav-link" href="Barangselesai">Barang Selesai</a> --}}
                            
                        </nav>
                    </div> 
                    @endif
                    <div class="sb-sidenav-menu-heading">Laporan</div>
                    <a class="nav-link" href="Laporan">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Laporan
                    </a>
                    <div class="sb-sidenav-menu-heading">Exit</div>
                    <a class="nav-link" href="{{route('logout')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>