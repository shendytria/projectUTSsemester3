<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#kategori-elements" aria-expanded="false"
                aria-controls="kategori-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Kategori</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kategori-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/kategori') }}">Kategori Buku</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#buku-tables" aria-expanded="false" aria-controls="buku-tables">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Buku</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="buku-tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/buku">Tambah Buku</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#user-tables" aria-expanded="false" aria-controls="user-tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Manajemen user</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/addusers">Tambah User</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#menu-tables" aria-expanded="false" aria-controls="menu-tables">
                <i class="icon-grid-2 menu-icon"></i>
                <span class="menu-title">Manajemen menu</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="menu-tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/menu">Tambah Menu</a></li>
                </ul>
            </div>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#role-tables" aria-expanded="false" aria-controls="role-tables">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Manajemen role</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="role-tables">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/Jenis_User">Tambah Role</a></li>
                    </ul>
                </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ url ('/email/create')}}">
                    <i class="icon-tag menu-icon"></i>
                    <span class="menu-title">Send Email</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url ('/email/inbox')}}">
                    <i class="icon-tag menu-icon"></i>
                    <span class="menu-title">Inbox</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
        </li>
    </ul>
</nav>
