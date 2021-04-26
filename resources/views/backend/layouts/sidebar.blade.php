<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="align-middle">Toko Dean</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main Activity
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-header">
                Master Data
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/panel/master-data/users') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/panel/master-data/users') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/panel/master-data/category-products') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/panel/master-data/category-products') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Category Products</span>
                </a>
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/panel/master-data/products') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/panel/master-data/products') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Products</span>
                </a>
            </li>
        </ul>
    </div>
</nav>