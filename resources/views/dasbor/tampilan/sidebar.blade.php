<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
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
    </div>
</nav>
