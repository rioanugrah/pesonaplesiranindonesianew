<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{ route('frontend') }}"><img src="{{ asset('frontend/logo/logo_plesiran_black.webp') }}"
                    alt="Logo Pesona Plesiran Indonesia"></a>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('frontend') }}">Beranda</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="javascript:void()">Tour Wisata</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('frontend.bromo') }}">Bromo</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('frontend.contact') }}">Kontak Kami</a>
                </li>
                <li>
                    @auth
                        <a class="style7" href="javascript:void()"
                            onclick="window.location.href='{{ route('home') }}'">
                            {{ auth()->user()->name }}
                            <i>
                                <svg width="5" height="8" viewBox="0 0 5 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.85355 4.35355C5.04882 4.15829 5.04882 3.84171 4.85355 3.64645L1.67157 0.464466C1.47631 0.269204 1.15973 0.269204 0.964466 0.464466C0.769204 0.659728 0.769204 0.976311 0.964466 1.17157L3.79289 4L0.964466 6.82843C0.769204 7.02369 0.769204 7.34027 0.964466 7.53553C1.15973 7.7308 1.47631 7.7308 1.67157 7.53553L4.85355 4.35355ZM4 4.5H4.5V3.5H4V4.5Z"
                                        fill="white" />
                                </svg>
                            </i>
                        </a>
                    @else
                        <a class="style7" href="javascript:void()"
                            onclick="window.location.href='{{ route('login') }}'">
                            Login
                            <i>
                                <svg width="5" height="8" viewBox="0 0 5 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.85355 4.35355C5.04882 4.15829 5.04882 3.84171 4.85355 3.64645L1.67157 0.464466C1.47631 0.269204 1.15973 0.269204 0.964466 0.464466C0.769204 0.659728 0.769204 0.976311 0.964466 1.17157L3.79289 4L0.964466 6.82843C0.769204 7.02369 0.769204 7.34027 0.964466 7.53553C1.15973 7.7308 1.47631 7.7308 1.67157 7.53553L4.85355 4.35355ZM4 4.5H4.5V3.5H4V4.5Z"
                                        fill="white" />
                                </svg>
                            </i>
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</div>
