<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{route('home')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="20">
                    </span>
                </a>

                <a href="{{route('home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('backend/images/logo_ppi.webp') }}" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="uil-minus-path"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block dropdown-notifications">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                    <i data-count="0" class="uil-bell"></i>
                    @if (auth()->user()->unreadNotifications->count() != 0)
                    <span class="badge bg-danger rounded-pill"><span class="notif-count" data-count="0">{{ auth()->user()->unreadNotifications->count() }}</span></span>
                    @else
                    <span class="badge bg-danger rounded-pill notif-count">0</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16"> Notifications</h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <div class="notification-items"></div>
                        @foreach (auth()->user()->unreadNotifications as $notification)
                        <a href="{{ $notification->data['url'] }}" class="text-reset notification-item mark-as-read" data-id="{{ $notification->id }}">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-{{ $notification->data['color_icon'] }} rounded-circle font-size-16">
                                            <i class="{{ $notification->data['icon'] }}"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mt-0 mb-1">{{ $notification->data['title'] }}</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">{{ $notification->data['message'] }}</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{ URL::asset('public/assets/images/users/avatar-4.jpg') }}" alt="Header Avatar"> --}}
                    <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{Str::ucfirst(Auth::user()->name)}}</span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">@lang('translation.View_Profile')</span></a>
                    <a class="dropdown-item" href="#"><i class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">@lang('translation.My_Wallet')</span></a>
                    <a class="dropdown-item d-block" href="#"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">@lang('translation.Settings')</span> <span class="badge bg-soft-success rounded-pill mt-1 ms-2">03</span></a>
                    <a class="dropdown-item" href="#"><i class="uil uil-lock-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">@lang('translation.Lock_screen')</span></a> --}}
                    {{-- <a class="dropdown-item" href="{{ route('pengguna.profile') }}"><i class="uil-chat-bubble-user font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Profile</span></a> --}}
                    <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
