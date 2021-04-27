<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link {{ request()->routeIs('home') == 'home' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>

      <!--   @if (auth()->user()->can('manajemen arsip') || auth()->user()->can('manajemen rak'))
       
                @can('manajemen produk')
                    <li class="nav-item">
                    </li>   
                @endcan

                @can('manajemen kategori')
                    <li class="nav-item">
                    </li>   
                @endcan
        @endif -->

        @if (auth()->user()->can('manajemen users'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'users' || request()->segment(1) == 'roles' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'users' || request()->segment(1) == 'roles' ) ? 'active' : '' }}">
                <i class="fas fa-user-astronaut nav-icon   "></i>
                <p>
                    Manajemen User
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('manajemen users')
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}"
                            class="nav-link {{ request()->routeIs('users.create') == 'users.create' ? 'active' : '' }}">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Tambah User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->routeIs('users.index') == 'users.index' ? 'active' : '' }}">
                            <i class="fas fa-users nav-icon   "></i>
                            <p>List Data User</p>
                        </a>
                    </li> 
                @endcan

                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') == 'roles.index' ? 'active' : '' }}">
                        <i class="fas fa-users-cog nav-icon   "></i>
                        <p>Role & Permission</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if (auth()->user()->can('manajemen arsip'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'arsip' || request()->segment(1) == 'tambaharsip' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'arsip' || request()->segment(1) == 'tambaharsip' ) ? 'active' : '' }}">
                <i class="fas fa-archive nav-icon"></i>
                <p>
                    Manajemen Arsip
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('arsip.create') }}"
                            class="nav-link {{ request()->routeIs('arsip.create') == 'arsip.create' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-plus-square nav-icon   "></i>
                            <p>Tambah</p>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{ route('arsip.index') }}"
                            class="nav-link {{ request()->routeIs('arsip.index') == 'arsip.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-table nav-icon"></i>
                            <p>Tabel</p>
                        </a>
                    </li>   
            </ul>
        </li>
        @endif

        @if (auth()->user()->can('manajemen rak'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'rak' || request()->segment(1) == 'tambahrak' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'rak' || request()->segment(1) == 'tambahrak' ) ? 'active' : '' }}">
                <i class="fas fa-tasks nav-icon    "></i>
                <p>
                    Manajemen Rak
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('rak.create') }}"
                            class="nav-link {{ request()->routeIs('rak.create') == 'rak.create' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-plus-square nav-icon   "></i>
                            <p>Tambah</p>
                        </a>
                    </li>   

                    <li class="nav-item">
                        <a href="{{ route('rak.index') }}"
                            class="nav-link {{ request()->routeIs('rak.index') == 'rak.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-table nav-icon   "></i>
                            <p>Tabel</p>
                        </a>
                    </li>   
            </ul>
        </li>
        @endif

        @if (auth()->user()->can('manajemen transaksi'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'transaksi' || request()->segment(1) == 'approval' || request()->segment(1) == 'history' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'transaksi' || request()->segment(1) == 'approval' || request()->segment(1) == 'history') ? 'active' : '' }}">
                <i class="fas fa-calendar-check nav-icon    "></i>
                <p>
                    Transaksi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('transaksi.index') }}"
                            class="nav-link {{ request()->routeIs('transaksi.index') == 'transaksi.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-comments nav-icon   "></i>
                            <p>Peminjaman</p>
                        </a>
                    </li>  

                    <li class="nav-item">
                        <a href="{{ route('approval.index') }}"
                            class="nav-link {{ request()->routeIs('approval.index') == 'approval.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-handshake nav-icon   "></i>
                            <p>Approval</p>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a href="{{ route('history.index') }}"
                            class="nav-link {{ request()->routeIs('history.index') == 'history.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-history nav-icon   "></i>
                            <p>History</p>
                        </a>
                    </li>  
            </ul>
        </li>
        @endif


        @if (auth()->user()->can('manajemen peminjaman'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'peminjaman' || request()->segment(1) == 'riwayat' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'peminjaman' || request()->segment(1) == 'riwayat') ? 'active' : '' }}">
                <i class="fas fa-calendar-check nav-icon    "></i>
                <p>
                    Peminjaman
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('peminjaman.user') }}"
                            class="nav-link {{ request()->routeIs('peminjaman.user') == 'peminjaman.user' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-comments nav-icon   "></i>
                            <p>Peminjaman</p>
                        </a>
                    </li>  

                    <li class="nav-item">
                        <a href="{{ route('riwayat.user') }}"
                            class="nav-link {{ request()->routeIs('riwayat.user') == 'riwayat.user' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-history nav-icon   "></i>
                            <p>Riwayat</p>
                        </a>
                    </li>  
            </ul>
        </li>
        @endif
        

        @role('admin') 
        <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link {{ request()->routeIs('setting.index') == 'setting.index' ? 'active' : '' }}">
                <i class="fas fa-cog nav-icon   "></i>
                <p>
                    Settings
                </p>
            </a>
        </li>
        @endrole

        <li class="nav-item">
            <a href="{{ route('profile.show', Auth::user()->id) }}" class="nav-link {{ request()->routeIs('profile.show') == 'profile.show' ? 'active' : '' }}">
                <i class="fas fa-user-ninja nav-icon   "></i>
                <p>
                    Profile
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt text-cyan   "></i>
                <p>
                    Logout
                </p>
                {{-- {{ __('Logout') }} --}}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>