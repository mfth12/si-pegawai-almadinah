<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Projects</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Cari sesuatu" aria-label="Search">

    <form action="/keluar">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                @csrf
                <button type="submit" class="nav-link px-3 bg-dark border-0">Keluar <span data-feather="log-out"></span></button>
            </div>
        </div>
    </form>
</header>