<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img src="/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ Route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer2"></i>
                                <p>لوحة التحكم</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('clients.index') }}" class="nav-link {{ request()->routeIs('clients.index') ? 'active' :'' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>العملاء</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('practitioners.index') }}" class="nav-link {{ request()->routeIs('practitioners.index') ? 'active' :'' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>الممارسين</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('appointments.index') }}" class="nav-link {{ request()->routeIs('appointments.index') ? 'active' :'' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>المواعيد</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('treatments.index') }}" class="nav-link {{ request()->routeIs('treatments.index') ? 'active' :'' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>العلاجات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('payments.index') }}" class="nav-link {{ request()->routeIs('payments.index') ? 'active' :'' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>المدفوعات</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('inventories.index') }}" class="nav-link {{ request()->routeIs('inventories.index') ? 'active' :'' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>المخزون</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
