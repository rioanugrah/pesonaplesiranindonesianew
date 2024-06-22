<footer class="footer-layout5 shape-mockup-wrap z-index-common" data-bg-src="{{ $asset }}/assets/img/bg/footer-bg-5.jpg">
    <div class="shape-mockup d-none d-xl-block z-index-n1" data-top="0" data-right="0%" data-left="0%">
        <img class="w-100" src="{{ $asset }}/assets/img/shape/footer-5-1.png" alt="svg">
    </div>
    <div class="widget-area2">
        <div class="container">
            <div class="row g-5 justify-content-between">
                <div class="col-md-6 col-xl-4">
                    <div class="widget footer-widget">
                        <div class="vs-widget-about">
                            <div class="footer-logo text-center d-block text-md-start">
                                <a href="index.html"><img src="{{ asset('frontend/logo/logo_plesiran_new_white.png') }}" alt="Logo Pesona Plesiran Indonesia White"
                                        class="logo" /></a>
                            </div>
                            <p class="footer-text">Pesona Plesiran Indonesia adalah Platform Digital Marketing milenial yang menyediakan kemudahan dalam mendapat informasi dan pemesanan Akomodasi, Destinasi, Restoran, Transportasi, Travel dan MICE se-Indonesia.</p>
                            <div class="social-style1">
                                <a href="https://www.instagram.com/pesonaplesiranid.official/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Perusahaan</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="javascript:void()">Tentang Kami</a></li>
                                <li><a href="javascript:void()">Kontak Kami</a></li>
                                <li><a href="javascript:void()">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="widget footer-widget">
                        <h4 class="widget_title">Our Email</h4>
                        <form class="newsletter-form">
                            <input class="form-control" type="email" placeholder="Your Email Address" />
                            <button type="submit" class="vs-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright-wrap">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-auto">
                    <p class="copyright-text">Copyright <i class="fal fa-copyright"></i>
                        {{-- <script>
                            document.write(new Date().getFullYear())
                        </script>  --}}
                        @if (date('Y') < 2021)
                            2021
                        @else
                            2021 - {{ date('Y') }}
                        @endif
                        <a href="javascript:void()">Pesona Plesiran Indonesia</a>.
                        All Rights Reserved.
                    </p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <div class="copyright-menu">
                        <ul class="list-unstyled">
                            <li><a href="javascript:void()">Privacy</a></li>
                            <li><a href="javascript:void()">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
