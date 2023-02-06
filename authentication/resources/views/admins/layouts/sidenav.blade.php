<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="{{ url('assets/img/logo.png') }}" alt="Brand Logo" class="img-fluid">
        </span>
        <a href="{{ route('admin.home') }}" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Admin</a>
        <a href="{{ route('admin.home') }}" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>
    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->
        <li class="sidenav-item active">
            <a href="{{ route('admin.home') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboards</div>
                <div class="pl-1 ml-auto">
                    <div class="badge badge-danger">Hot</div>
                </div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Components</li>
        <li class="sidenav-item">
            <a href="{{ route('categories.index') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-type"></i>
                <div>Categories</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="{{ route('products.index') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-shopping-cart"></i>
                <div>Products</div>
            </a>
        </li>

        <!-- UI elements -->
        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-box"></i>
                <div>Info Users</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="{{ route('admin.customer') }}" class="sidenav-link">
                        <div>Customer</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="{{ route('admin.order') }}" class="sidenav-link">
                        <div>Order</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Pages -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Pages</li>
        <li class="sidenav-item">
            <a href="pages_authentication_login-v1.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-lock"></i>
                <div>Login</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="pages_authentication_register-v1.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-user"></i>
                <div>Signup</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="pages_faq.html" class="sidenav-link">
                <i class="sidenav-icon feather icon-anchor"></i>
                <div>FAQ</div>
            </a>
        </li>
    </ul>
</div>