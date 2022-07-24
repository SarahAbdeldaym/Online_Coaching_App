<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="http://localhost:8000/storage/images/logo.png" alt="captainy logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">@lang('admin.sitename')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (!empty(admin()->user()->image))
                    <img src="{{ url('storage/' . admin()->user()->image) }}" style="width: 35px; height: 35px;"
                        class="img-circle elevation-2" alt="User Image" />
                @else
                    <img src="{{ url('/design/adminlte') }}/dist/img/avatar5.png" class="img-circle elevation-2"
                        alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    @if (lang() == 'en')
                        {{ admin()->user()->name_en }}
                    @else
                        {{ admin()->user()->name_ar }}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard menu -->
                <li class="nav-item">
                    <a href="{{ adminUrl('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>{{ trans('admin.control_panel') }}</p>
                    </a>
                </li>

                <!-- admins menu -->
                <li class="nav-item">
                    <a href="{{ adminUrl('admins') }}"
                        class="nav-link {{ request()->is('admin/admins') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>{{ trans('admin.admins') }}</p>
                    </a>
                </li>

                <!-- Clients Dashboard -->
                <li class="nav-item">
                    <a href="{{ adminUrl('clients') }}"
                        class="nav-link {{ request()->is('admin/clients') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>{{ trans('admin.clients') }}</p>
                    </a>
                </li>

                <!-- Coaches Dashboard -->
                <li class="nav-item">
                    <a href="{{ adminUrl('coaches') }}"
                        class="nav-link {{ request()->is('admin/coaches') ? 'active' : '' }}">
                        <i class="fas fa-users nav-icon"></i>
                        <p>{{ trans('coach.coaches') }}</p>
                    </a>
                </li>

                <!-- Specialists menu -->
                <li class="nav-item">
                    <a href="{{ adminUrl('specialists') }}"
                        class="nav-link {{ request()->is('admin/specialists') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-bookmark"></i>
                        <p>
                            {{ trans('coach.specialists') }}
                        </p>
                    </a>
                </li>

                <!-- Countries menu -->
                <li class="nav-item has-treeview">
                    <a href="#"
                        class="nav-link {{ request()->is('admin/country') || request()->is('admin/city') || request()->is('admin/districts') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-earth-africa"></i>
                        <p>
                            {{ trans('admin.countries') . '/' . trans('admin.cities') }}
                            @if (direction() == 'rtl')
                                <i class="right fas fa-angle-right"></i>
                            @else
                                <i class="right fas fa-angle-left"></i>
                            @endif
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Countries Dashboard -->
                        <li class="nav-item">
                            <a href="{{ adminUrl('countries') }}"
                                class="nav-link {{ request()->is('admin/countries') ? 'active' : '' }}">
                                <i class="far fa-flag nav-icon"></i>
                                <p>{{ trans('admin.countries') }}</p>
                            </a>
                        </li>

                        <!-- Cities Dashboard -->
                        <li class="nav-item">
                            <a href="{{ adminUrl('cities') }}"
                                class="nav-link {{ request()->is('admin/cities') ? 'active' : '' }}">
                                <i class="far fa-flag nav-icon text-green"></i>
                                <p>{{ trans('admin.cities') }}</p>
                            </a>
                        </li>

                        <!-- Districts Dashboard -->
                        <li class="nav-item">
                            <a href="{{ adminUrl('districts') }}"
                                class="nav-link {{ request()->is('admin/districts') ? 'active' : '' }}">
                                <i class="far fa-flag nav-icon text-orange"></i>
                                <p>{{ trans('admin.districts') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Booking Dashboard -->
                <li class="nav-item">
                    <a href="{{ adminUrl('books') }}"
                        class="nav-link {{ request()->is('admin/books') ? 'active' : '' }}">
                        <i class="fas fa-calendar-check nav-icon"></i>
                        <p>{{ trans('admin.books') }}</p>
                    </a>
                </li>

                <!-- Feedback Dashboard -->
                <li class="nav-item">
                    <a href="{{ adminUrl('feedbacks') }}"
                        class="nav-link {{ request()->is('admin/feedbacks') ? 'active' : '' }}">
                        <i class="fas fa-comments nav-icon"></i>
                        <p>{{ trans('admin.feedback') }}</p>
                    </a>
                </li>

                <!-- Statistics Dashboard -->
                <li class="nav-item">
                    <a href="{{ adminUrl('statistics') }}"
                        class="nav-link {{ request()->is('admin/statistics') ? 'active' : '' }}">
                        <i class="fas fa-chart-line nav-icon"></i>
                        <p>{{ trans('admin.statistics') }}</p>
                    </a>
                </li>

                <!-- Setting menu -->
                <li class="nav-item">
                    <a href="{{ adminUrl('settings') }}"
                        class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>{{ trans('admin.settings') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
