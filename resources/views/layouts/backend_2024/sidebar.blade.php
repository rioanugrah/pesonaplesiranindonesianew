<div class="vertical-menu mm-active">

    <div class="navbar-brand-box">
        <a href="{{route('home')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('backend/images/logo_plesiran_black.webp') }}" alt="" height="40">
            </span>
        </a>

        <a href="{{route('home')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('backend/images/logo_plesiran_black.webp') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- @can('dashboard') --}}
                <li class="{{ request()->is('home*') ? 'mm-active' : null }}">
                    <a href="{{route('home')}}" class="{{ request()->is('home*') ? 'active' : null }}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- @endcan --}}
                @can('paket wisata-list')
                <li class="{{ request()->is('bromo*') ? 'mm-active' : null }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-home-alt"></i>
                        <span>Paket Wisata</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->is('bromo*') ? 'active' : null }}"><a href="{{ route('bromo.b_index') }}">Bromo</a></li>
                        <li><a href="#">Tour</a></li>
                    </ul>
                </li>
                @endcan
                <li class="menu-title">Camping</li>
                <li class="{{ request()->is('b/camping/category*') ? 'mm-active' : null }}">
                    <a href="{{ route('b.camping_category_index') }}">
                        <i class="uil-notebooks"></i>
                        <span>Category</span>
                    </a>
                </li>
                <li class="{{ request()->is('b/camping/pricelist*') ? 'mm-active' : null }}">
                    <a href="{{ route('b.camping_pricelist_index') }}">
                        <i class="uil-newspaper"></i>
                        <span>Pricelist</span>
                    </a>
                </li>
                <li class="{{ request()->is('b/camping/reservation*') ? 'mm-active' : null }}">
                    <a href="{{ route('b.camping_reservation_index') }}">
                        <i class="uil-backpack"></i>
                        <span>Reservation</span>
                    </a>
                </li>
                <li class="{{ request()->is('b/camping/orders*') ? 'mm-active' : null }}">
                    <a href="{{ route('b.camping_orders_index') }}">
                        <i class="uil-shopping-cart-alt"></i>
                        <span>Order</span>
                    </a>
                </li>
                @can('transaction-list')
                <li class="menu-title">Transaction</li>
                <li>
                    <a href="{{ route('b.transaction') }}">
                        <i class="uil-card-atm"></i>
                        <span>Transaction</span>
                    </a>
                </li>
                @endcan
                @can('marketing-list')
                <li class="menu-title">Marketing</li>
                <li class="{{ request()->is('emails*') ? 'mm-active' : null }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-home-alt"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="{{ request()->is('emails/template*') ? 'active' : null }}"><a href="{{ route('emails.b_template') }}">Template</a></li>
                        <li class="{{ request()->is('emails*') ? 'active' : null }}"><a href="{{ route('emails.b_email') }}">Email</a></li>
                    </ul>
                </li>
                @endcan
                @can('permission-list')
                <li class="menu-title">User Management</li>
                <li>
                    <a href="{{ route('permissions') }}">
                        <i class="uil-key-skeleton-alt"></i>
                        <span>Permission</span>
                    </a>
                </li>
                @endcan
                @can('role-list')
                <li>
                    <a href="{{ route('roles.index') }}">
                        <i class="uil-user-circle"></i>
                        <span>Roles</span>
                    </a>
                </li>
                @endcan
                @can('user-list')
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="uil-user-circle"></i>
                        <span>User</span>
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
