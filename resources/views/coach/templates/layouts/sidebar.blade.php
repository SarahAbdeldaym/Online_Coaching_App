<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ url('/design/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">@lang('admin.sitename')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (!empty(coach()->user()->image))
                    <img src="{{ url('storage/' . coach()->user()->image) }}" style="width: 35px; height: 35px;"
                        class="img-circle elevation-2" alt="User Image" />
                @else
                    <img src="{{ url('/design/adminlte') }}/dist/img/avatar5.png" class="img-circle elevation-2"
                        alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if (lang() == 'en')
                        {{ coach()->user()->name_en }}
                    @else
                        {{ coach()->user()->name_ar }}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ coachUrl('dashboard') }}"
                        class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}
                    ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ trans('admin.control_panel') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('coach.profile') }}"
                        class="nav-link
                        {{ Request::is('coach/profile') ? 'active' : '' }} ">
                        <i class="fas fa-user nav-icon"></i>
                        <p>{{ trans('admin.Profile') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('coach/appointments') }}"
                        class="nav-link
                    {{ Request::is('coach/appointments') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>{{ trans('admin.my_appointments') }}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('coach/schedule') }}"
                        class="nav-link
                    {{ Request::is('coach/schedule') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>{{ trans('admin.schedule') }}</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
