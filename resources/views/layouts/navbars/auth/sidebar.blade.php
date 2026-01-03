<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="{{ asset('/assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">Undangan</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach (config('menu.dashboard') as $item)
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs( $item['route']."*") ? 'active' : '' }}"
                        href="{{ route($item['route']) }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;"
                                class="{{ $item['icon'] }} text-center {{ Request::routeIs($item['route']."*") ? 'text-white' : 'text-dark' }} "
                                aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">{{ $item['title'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
