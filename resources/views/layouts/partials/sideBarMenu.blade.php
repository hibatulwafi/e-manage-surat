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

      <!--   @if (auth()->user()->can('manajemen surat') || auth()->user()->can('manajemen rak'))
       
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

      <!--   @if (auth()->user()->can('manajemen surat'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'surat' || request()->segment(1) == 'tambahsurat' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'surat' || request()->segment(1) == 'tambahsurat' ) ? 'active' : '' }}">
                <i class="fas fa-archive nav-icon"></i>
                <p>
                    Manajemen Surat
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('surat.index') }}"
                            class="nav-link {{ request()->routeIs('surat.index') == 'surat.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-envelope nav-icon"></i>
                            <p>Surat Masuk</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('surat.index') }}"
                            class="nav-link {{ request()->routeIs('surat.index') == 'surat.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-envelope-open nav-icon"></i>
                            <p>Surat Keluar</p>
                        </a>
                    </li> 

            </ul>
        </li>
        @endif
 -->
    <!--     @if (auth()->user()->can('manajemen rak'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'rak' || request()->segment(1) == 'tambahrak' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'rak' || request()->segment(1) == 'tambahrak' ) ? 'active' : '' }}">
                <i class="fas fa-th nav-icon    "></i>
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
                            <p>Tambah Data</p>
                        </a>
                    </li>   

                    <li class="nav-item">
                        <a href="{{ route('rak.index') }}"
                            class="nav-link {{ request()->routeIs('rak.index') == 'rak.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-tasks nav-icon   "></i>
                            <p>List Rak</p>
                        </a>
                    </li>   
            </ul>
        </li>
        @endif -->


        @if (auth()->user()->can('manajemen rak'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'siswa' || request()->segment(1) == 'guru' || request()->segment(1) == 'rak' || request()->segment(1) == 'surat' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'siswa' || request()->segment(1) == 'guru' || request()->segment(1) == 'rak' || request()->segment(1) == 'surat') ? 'active' : '' }}">
                <i class="fas fa-th nav-icon    "></i>
                <p>
                    Master Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('guru.index') }}"
                            class="nav-link {{ request()->routeIs('guru.index') == 'guru.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-user nav-icon   "></i>
                            <p>Data Guru</p>
                        </a>
                    </li>   

                    <li class="nav-item">
                        <a href="{{ route('siswa.index') }}"
                            class="nav-link {{ request()->routeIs('siswa.index') == 'siswa.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-users nav-icon   "></i>
                            <p>Data Siswa</p>
                        </a>
                    </li>  

                    <li class="nav-item">
                        <a href="{{ route('surat.index') }}"
                            class="nav-link {{ request()->routeIs('surat.index') == 'surat.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-envelope-open nav-icon"></i>
                            <p>Data Surat</p>
                        </a>
                    </li>   
                    <li class="nav-item">
                        <a href="{{ route('rak.index') }}"
                            class="nav-link {{ request()->routeIs('rak.index') == 'rak.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-archive nav-icon   "></i>
                            <p>Data Rak</p>
                        </a>
                    </li> 
            </ul>
        </li>
        @endif

        <li>
            <hr style=" border-top: 1px solid gray;">
        </li>
        @if (auth()->user()->can('manajemen transaksi'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'transaksi' || request()->segment(1) == 'approval' || request()->segment(1) == 'history' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'transaksi' || request()->segment(1) == 'approval' || request()->segment(1) == 'history') ? 'active' : '' }}">
                <i class="fa fa-comments nav-icon    "></i>
                <p>
                    Pengajuan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('approval.index') }}"
                            class="nav-link {{ request()->routeIs('approval.index') == 'approval.index' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-handshake nav-icon   "></i>
                            <p>Pengajuan Baru</p>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a href="{{ route('pengajuan.riwayat') }}"
                            class="nav-link {{ request()->routeIs('pengajuan.riwayat') == 'pengajuan.riwayat' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-history nav-icon   "></i>
                            <p>Riwayat</p>
                        </a>
                    </li>  
            </ul>
        </li>
        @endif

        @if (auth()->user()->can('manajemen transaksi'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'surattugas' ||  request()->segment(1) == 'keterangan' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'surattugas' || request()->segment(1) == 'keterangan') ? 'active' : '' }}">
                <i class="fa fa-envelope nav-icon    "></i>
                <p>
                    Buat Surat
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('create.keterangan') }}"
                            class="nav-link {{ request()->routeIs('create.keterangan') == 'create.keterangan' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
                            <p>Surat Keterangan</p>
                        </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a href="{{ route('create.surattugas') }}"
                            class="nav-link {{ request()->routeIs('create.surattugas') == 'create.surattugas' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
                            <p>Surat Tugas</p>
                        </a>
                    </li>   
            </ul>
        </li>
        @endif


        @if (auth()->user()->can('manajemen pengajuan'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'pengajuan') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'pengajuan') ? 'active' : '' }}">
                <i class="fa fa-envelope nav-icon    "></i>
                <p>
                    Pengajuan Surat
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                    @if( ucfirst(Auth::user()->roles[0]->name) == "Siswa")
                    <li class="nav-item">
                        <a href="{{ route('pengajuan.keterangan') }}"
                            class="nav-link {{ request()->routeIs('pengajuan.keterangan') == 'pengajuan.keterangan' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
                            <p>Surat Keterangan</p>
                        </a>
                    </li>
                    @endif
                    @if( ucfirst(Auth::user()->roles[0]->name) == "Guru")
                    <li class="nav-item">
                        <a href="{{ route('pengajuan.surattugas') }}"
                            class="nav-link {{ request()->routeIs('pengajuan.surattugas') == 'pengajuan.surattugas' ? 'active' : '' }}">
                            &nbsp;&nbsp;<i class="fas fa-file nav-icon"></i>
                            <p>Surat Tugas</p>
                        </a>
                    </li>   
                    @endif
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('pengajuan.status') }}"
                class="nav-link {{ request()->routeIs('pengajuan.status') == 'pengajuan.status' ? 'active' : '' }}">
                <i class="nav-icon fas fa-info-circle "></i>
                <p>
                    Status Pengajuan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pengajuan.riwayat') }}"
                class="nav-link {{ request()->routeIs('pengajuan.riwayat') == 'pengajuan.riwayat' ? 'active' : '' }}">
                <i class="nav-icon fas fa-history "></i>
                <p>
                    Riwayat
                </p>
            </a>
        </li>

        @endif

        <li>
            <hr style=" border-top: 1px solid gray;">
        </li>

        @if (auth()->user()->can('manajemen transaksi'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'transaksi' || request()->segment(1) == 'approval' || request()->segment(1) == 'history' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'transaksi' || request()->segment(1) == 'approval' || request()->segment(1) == 'history') ? 'active' : '' }}">
                <i class="fa fa-cog nav-icon    "></i>
                <p>
                    Settings
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @role('admin') 
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link {{ request()->routeIs('setting.index') == 'setting.index' ? 'active' : '' }}">
                        <i class="fas fa-cog nav-icon   "></i>
                        <p>
                            Settings App
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
            </ul>
        </li>
        @endif


      

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