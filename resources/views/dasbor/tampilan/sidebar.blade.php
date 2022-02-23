<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Menu</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dasbor') ? 'active' : '' }}" aria-current="page" href="/dasbor">
                    <span data-feather="home"></span>
                    Dasbor
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dasbor/posts*') ? 'active' : '' }}" href="/dasbor/posts">
                    <span data-feather="file-text"></span>
                    Posts
                </a>
            </li>

        </ul>
        {{-- ends --}}

        {{-- mulai can --}}
        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Konfigurasi</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dasbor/kategori*') ? 'active' : '' }}" href="/dasbor/kategori">
                    <span data-feather="grid"></span>
                    Kategori Pos
                </a>
            </li>
        </ul>
        @endcan
        {{-- selesai can --}}
    </div>
</nav>
