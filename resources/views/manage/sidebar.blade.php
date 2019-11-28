<div class="sidebar" data-color="white" data-active-color="danger">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="../assets/img/logo-small.png">
            </div>
        </a>
        <a href="{{ route('home' )}}" class="simple-text logo-normal">
            {{ config('app.name', 'Laravel') }}
            <!-- <div class="logo-image-big">
              <img src="../assets/img/logo-big.png">
            </div> -->
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class=" {{ Request::is('manage/dashboard') ? 'active' : '' }}">
                <a href="{{ route('manage:dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <hr>

            <li class="">
                <a href="">
                    <p>Product</p>
                </a>
            </li>

            @permission('read-package')
            <li class=" {{ Request::is('manage/package/*') ? 'active' : '' }}">
                <a href="{{ route('manage:package:index') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>Package</p>
                </a>
            </li>
            @endpermission

            <hr>

            <li class="">
                <a href="">
                    <p>Sales</p>
                </a>
            </li>

            @permission('read-order')
            <li class=" {{ Request::is('manage/order/*') ? 'active' : '' }}">
                <a href="{{ route('manage:order:index') }}">
                    <i class="nc-icon nc-delivery-fast"></i>
                    <p>Order</p>
                </a>
            </li>
            @endpermission

            @permission('read-order')
            <li class=" {{ Request::is('manage/sale/*') ? 'active' : '' }}">
                <a href="{{ route('manage:sale:index') }}">
                    <i class="nc-icon nc-single-copy-04"></i>
                    <p>Sales</p>
                </a>
            </li>
            @endpermission

            <hr>

            <li class="">
                <a href="">
                    <p>Management</p>
                </a>
            </li>

            @permission('read-customer')
            <li class=" {{ Request::is('manage/customer/*') ? 'active' : '' }}">
                <a href="{{ route('manage:customer:index') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>Customers</p>
                </a>
            </li>
            @endpermission

            @permission('read-user')
            <li class=" {{ Request::is('manage/user/*') ? 'active' : '' }}">
                <a href="{{ route('manage:user:index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Users</p>
                </a>
            </li>
            @endpermission
            @permission('read-roles')
            <li class=" {{ Request::is('manage/role/*') ? 'active' : '' }}">
                <a href="{{ route('manage:role:index') }}">
                    <i class="nc-icon nc-lock-circle-open"></i>
                    <p>Roles</p>
                </a>
            </li>
            @endpermission
            @permission('read-permission')
            <li class=" {{ Request::is('manage/permission/*') ? 'active' : '' }}">
                <a href="{{ route('manage:permission:index') }}">
                    <i class="nc-icon nc-key-25"></i>
                    <p>Permissions</p>
                </a>
            </li>
            @endpermission
        </ul>
    </div>
</div>