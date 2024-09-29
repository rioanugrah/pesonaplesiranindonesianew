<header class="main-header header-style3 flex">
    <!-- Header Lower -->
    <div id="header">
        <div class="tf-container">
            <div class="header-top">
                <div class="header-top-wrap flex-two">
                    <div class="header-top-right">
                        <ul class=" flex-three">
                            <li class="flex-three">
                                <i class="icon-Group-32"></i>
                                <span>Whatsapp Admin: 0858-6722-4494</span>
                            </li>
                            <li class="flex-three">
                                <i class="icon-mail"></i>
                                <span>Email: contact@plesiranindonesia.com</span>
                            </li>
                        </ul>
                    </div>
                    <div class="header-top-left flex-two">
                        <div class="follow-social flex-two">
                            <ul class="flex-two">
                                <li><a href="#"><i class="icon-icon-1"></i></a></li>
                                <li><a href="#"><i class="icon-icon_03"></i></a></li>
                                <li><a href="#"><i class="icon-x"></i></a></li>
                                <li><a href="#"><i class="icon-icon"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="header-lower">
                <div class="tf-container full">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner-container flex justify-space align-center">
                                <!-- Logo Box -->

                                <div class="logo-box">
                                    <div class="logo">
                                        <a href="{{ route('frontend') }}">
                                            <img src="{{ asset('frontend/logo/logo_plesiran_new_white.png') }}"
                                                width="550" alt="Logo Pesona Plesiran Indonesia">
                                        </a>
                                    </div>
                                </div>
                                <div class="nav-outer flex align-center">
                                    <!-- Main Menu -->
                                    <nav class="main-menu show navbar-expand-md">
                                        <div class="navbar-collapse collapse clearfix"
                                            id="navbarSupportedContent">
                                            <ul class="navigation clearfix">
                                                <li class="current">
                                                    <a href="{{ route('frontend') }}">Beranda</a>
                                                </li>
                                                <li class="dropdown2">
                                                    <a href="#">Wisata</a>
                                                    <ul>
                                                        <li><a href="#">Bromo</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                    <!-- Main Menu End-->
                                </div>
                                <div class="header-account flex align-center">

                                    <div class="search-mobie relative">
                                        <div class="dropdown">
                                            <a type="button" class="show-search"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-Vector5"></i>
                                            </a>
                                            <ul class="dropdown-menu top-search">
                                                <form action="/" id="search-bar-widget">
                                                    <input type="text" placeholder="Search here...">
                                                    <button type="button"><i
                                                            class="icon-search-2"></i></button>
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="address-wrap-right flex-three ">
                                        <div class="icon flex-five">
                                            <i class="icon-Group-32"></i>
                                        </div>
                                        <div class="content">
                                            <span>Whatsapp Office</span>
                                            <p>0813-3112-6991</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="mobile-nav-toggler mobile-button">
                                    <i class="icon-bar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- End Header Lower -->

    <!-- Mobile Menu  -->
    <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="nav-logo"><a href="{{ route('frontend') }}">
                    <img src="{{ asset('frontend/logo/logo_plesiran_new_white.png') }}" alt=""></a></div>
            <div class="bottom-canvas">
                <div class="menu-outer">
                </div>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

</header>
