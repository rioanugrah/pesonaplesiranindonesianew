<header class="vs-header header-layout5">
    {{-- <div class="header-top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="header-social">
                        <a href="https://www.instagram.com/pesonaplesiranid.official/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="vs-logo">
                        <a href="{{ route('frontend') }}"><img src="{{ asset('frontend/logo/logo_plesiran_black.webp') }}" alt="Logo Pesona Plesiran Indonesia" width="250"></a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="items d-none d-lg-flex">
                        <div class="item2">
                            <div class="item2__icon">
                                <img src="{{ $asset }}/assets/img/icons/loc-icon-1.svg" alt="phone icon 1">
                            </div>
                            <div class="item2__text">
                                <a>Jl. Raya Tlogowaru No.3, Tlogowaru, Kec. Kedungkandang, Malang, Jawa Timur</a>
                            </div>
                        </div>
                        <div class="item2">
                            <div class="item2__icon">
                                <img src="{{ $asset }}/assets/img/icons/email-icon-1.svg" alt="email icon 1">
                            </div>
                            <div class="item2__text">
                                <span>Email:</span>
                                <a href="mailto:contact@plesiranindonesia.com">contact@plesiranindonesia.com</a>
                            </div>
                        </div>
                        <div class="item2 d-none d-xl-flex">
                            <div class="item2__icon">
                                <img src="{{ $asset }}/assets/img/icons/phone-icon-1.svg" alt="phone icon 1">
                            </div>
                            <div class="item2__text">
                                <span>Whatsapp:</span>
                                <a href="tel:+6281331126991">0813-3112-6991 (Admin 1)</a>
                                <a href="tel:+6285867224494">0858-6722-4494 (Admin 2)</a>
                            </div>
                        </div>
                    </div>
                    <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper d-none d-lg-block">
        <div class="sticky-active">
            <div class="container position-relative z-index-common">
                <div class="header-box">
                    <div class="row align-items-center">
                        <div class="col">
                            <nav class="main-menu  menu-style1 d-none d-lg-block">
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
                                    {{-- <li class="menu-item-has-children">
                                        <a href="#">Destinations</a>
                                        <ul class="sub-menu">
                                            <li><a href="destinations.html">Destinations</a></li>
                                            <li><a href="destination-details.html">Destinations Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children mega-menu-wrap">
                                        <a href="#">Pages</a>
                                        <ul class="mega-menu">
                                            <li>
                                                <a href="shop.html">Pagelist 1</a>
                                                <ul>
                                                    <li><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="index-4.html">Home Four</a></li>
                                                    <li><a href="index-5.html">Home Five</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Pagelist 2</a>
                                                <ul>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="destinations.html">Destinations</a></li>
                                                    <li><a href="destination-details.html">Destinations Details</a>
                                                    </li>
                                                    <li><a href="tours.html">Tours List</a></li>
                                                    <li><a href="tour-booking.html">Tour Booking</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Pagelist 3</a>
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="shop-details.html">Shop Details</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="blog.html">Blog List</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Pagelist 4</a>
                                                <ul>
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="error.html">Error Page</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Tours</a>
                                        <ul class="sub-menu">
                                            <li><a href="tours.html">Tours List</a></li>
                                            <li><a href="tour-booking.html">Tour Booking</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-details.html">Shop Details</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog List</a></li>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-right">
                                <ul>
                                    {{-- <li>
                                        <div class="header-btns">
                                            <button class="searchBoxTggler">
                                                <i class="fal fa-search"></i>
                                            </button>
                                            <button class="sideCartToggler">
                                                <i class="fas fa-shopping-basket"></i><span
                                                    class="button-badge">2</span>
                                            </button>
                                        </div>
                                    </li> --}}
                                    <li>
                                        @auth
                                        <a class="vs-btn style7" href="javascript:void()" onclick="window.location.href='{{ route('home') }}'">
                                            {{ auth()->user()->name }}
                                            <i>
                                                <svg width="5" height="8" viewBox="0 0 5 8"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.85355 4.35355C5.04882 4.15829 5.04882 3.84171 4.85355 3.64645L1.67157 0.464466C1.47631 0.269204 1.15973 0.269204 0.964466 0.464466C0.769204 0.659728 0.769204 0.976311 0.964466 1.17157L3.79289 4L0.964466 6.82843C0.769204 7.02369 0.769204 7.34027 0.964466 7.53553C1.15973 7.7308 1.47631 7.7308 1.67157 7.53553L4.85355 4.35355ZM4 4.5H4.5V3.5H4V4.5Z"
                                                        fill="white" />
                                                </svg>
                                            </i>
                                        </a>
                                        @else
                                        <a class="vs-btn style7" href="javascript:void()" onclick="window.location.href='{{ route('login') }}'">
                                            Login
                                            <i>
                                                <svg width="5" height="8" viewBox="0 0 5 8"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
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
                </div>
            </div>
        </div>
    </div>
</header>
