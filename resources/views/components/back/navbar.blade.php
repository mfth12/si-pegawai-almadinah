{{-- Navbar --}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{-- Left navbar links --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    {{-- SEARCH FORM --}}
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Cari" aria-label="Cari">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    {{-- Right navbar links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Fullscreen button --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        {{-- Notifications Menu --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">9</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">9 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item" onclick="dev()">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item" onclick="dev()">
                    <i class="fas fa-user-group mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item" onclick="dev()">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item dropdown-footer" onclick="dev()">See All Notifications</a>
            </div>
        </li>
        {{-- Option Menu --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bars"></i>
            </a>
            {{-- <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="dropdown-item"><i class="fas fa-envelope mr-2"></i><a href="/keluar">Keluar</a></li>
            </ul> --}}
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <a href="/profil" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> 
                    Profil
                </a>
                {{-- <div class="dropdown-divider"></div> --}}
                <a href="/dokumen" class="dropdown-item">
                    <i class="fas fa-folder-open mr-2"></i> 
                    Dokumen
                </a>
                {{-- <div class="dropdown-divider"></div> --}}
                <a href="/konfig" class="dropdown-item">
                    <i class="fas fa-gear mr-2"></i> 
                    Konfigurasi
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" onclick="keluarConfirm('/keluar')" class="dropdown-item">
                    <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>
{{-- /.navbar --}}
