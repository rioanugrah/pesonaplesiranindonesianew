<div class="vertical-menu mm-active">

    <div class="navbar-brand-box">
        <a href="{{route('home')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('backend/images/logo_plesiran_new_black.webp') }}" alt="" height="40">
            </span>
        </a>

        <a href="{{route('home')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('backend/images/logo_plesiran_new_black.webp') }}" alt="" height="20">
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
                <li>
                    <a href="{{route('home')}}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- @endcan --}}
            </ul>
        </div>
    </div>
</div>
