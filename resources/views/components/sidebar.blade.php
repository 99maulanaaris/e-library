<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ request()->is('/') ? 'active' : '' }}">
            <a href="/" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @hasrole('User')
        <li class="sidebar-item {{ request()->is('user/buku') ? 'active' : '' }}">
            <a href={{ route('user.book') }} class='sidebar-link'>
                <i class="bi bi-book"></i>
                <span>Daftar Buku</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->is('laporan/user') ? 'active' : '' }}">
            <a href={{ route('laporan.user') }} class='sidebar-link'>
                <i class="bi bi-calendar2-check"></i>
                <span>Laporan</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->is('checkout') ? 'active' : '' }}">
            <a href={{ route('checkout.table') }} class='sidebar-link'>
                <i class="bi bi-cart-check"></i>
                <span>Check Out</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->is('history/user') ? 'active' : '' }}">
            <a href={{ route('history.user') }} class='sidebar-link'>
                <i class="bi bi-clock-history"></i>
                <span>History</span>
            </a>
        </li>
        @endhasrole
        @hasrole('Admin')
        <li class="sidebar-item has-sub {{ request()->is('buku', 'buku/tambah') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-book"></i>
                <span>Data Buku</span>
            </a>
            <ul class="submenu {{ request()->is('buku', 'buku/tambah') ? 'active' : '' }} ">
                <li class="submenu-item {{ request()->is('buku') ? 'active' : '' }}">
                    <a href={{ route('table.buku') }}> Daftar Buku</a>
                </li>
                <li class="submenu-item {{ request()->is('buku/tambah') ? 'active' : '' }}">
                    <a href={{ route('add.buku') }}>Tambah Buku</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  {{ request()->is('user') ? 'active' : '' }}  ">
            <a href={{ route('show.user') }} class='sidebar-link'>
                <i class="bi bi-person-lines-fill"></i>
                <span>Daftar User</span>
            </a>
        </li>

        <li class="sidebar-item has-sub {{ request()->is('laporan', 'laporan/pengembalian') ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="bi bi-calendar2-check"></i>
                <span>Laporan</span>
            </a>
            <ul class="submenu {{ request()->is('laporan', 'laporan/pengembalian') ? 'active' : '' }} ">
                <li class="submenu-item {{ request()->is('laporan') ? 'active' : '' }}">
                    <a href={{ route('table.laporan') }}>Pinjaman</a>
                </li>
                <li class="submenu-item {{ request()->is('laporan/pengembalian') ? 'active' : '' }}">
                    <a href={{ route('table.pengembalian') }}>Pengembalian</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item {{ request()->is('history') ? 'active' : '' }}">
            <a href={{ route('history') }} class='sidebar-link'>
                <i class="bi bi-clock-history"></i>
                <span>History</span>
            </a>
        </li>
        @endhasrole
    </ul>
</div>
