<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3">
            <div class="d-flex">
                <div class="image">
                    <img src="admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Phạm Hoàng An</a>
                </div>
            </div>
            <div class="d-flex" style="margin-top: 10px;">
                <div class="image" style="align-items: center">
                    <i class="fas fa-sign-out-alt nav-icon" style="color: white; font-size:19px; vertical-align: middle; padding-top: 7px;"></i>
                </div>
                <div class="info">
                    <a href="{{ route('logout') }}" class="d-block">Đăng xuất</a>
                </div>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tài Khoản
                        </p>
                    </a>
                </li>
                {{-- @foreach ($tableProperties as $key => $item)
                    <li class="nav-item">
                        <a href="{{ route($key.'.index') }}" class="nav-link {{ $key == $table ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ $translate[$key] }}
                            </p>
                        </a>
                    </li>
                @endforeach --}}


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
