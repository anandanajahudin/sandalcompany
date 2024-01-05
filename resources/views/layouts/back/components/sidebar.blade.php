<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        @if (Auth::user()->user_type != 'customer')
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('employee.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-user"></i>
                    </span>
                    <span class="hide-menu">Employees</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('customer.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-brand-office"></i>
                    </span>
                    <span class="hide-menu">Customers</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('department.index') }}" aria-expanded="false">
                    <span>
                        <i class="ti ti-analyze"></i>
                    </span>
                    <span class="hide-menu">Departments</span>
                </a>
            </li>
        @endif

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Product</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-analyze"></i>
                </span>
                <span class="hide-menu">Product</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('category.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-analyze"></i>
                </span>
                <span class="hide-menu">Product Category</span>
            </a>
        </li>

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Order</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('order.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-affiliate"></i>
                </span>
                <span class="hide-menu">Order</span>
            </a>
        </li>

        @if (Auth::user()->user_type != 'customer')
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Profile</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('testimonial.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-affiliate"></i>
                </span>
                <span class="hide-menu">Testimonial</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
