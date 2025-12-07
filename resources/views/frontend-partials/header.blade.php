@php
    // small, self-contained header partial.
    // Keeps one header, one mobile popup and one offcanvas side menu.
@endphp

<style>
    /* Mobile popup and helper header tweaks */
    .logo img,
    .logo video {
        max-height: 64px;
        width: auto;
        display: block
    }

    .popup-mobile-menu {
        right: 0;
        left: auto;
        transform: translateX(100%);
        transition: transform .28s ease-in-out;
        background: #fff;
        color: #333;
    }

    .popup-mobile-menu.active {
        transform: translateX(0);
    }

    body.active-dark-mode .popup-mobile-menu {
        background: #111;
        color: #fff
    }

    .rbt-main-navigation .mainmenu>li {
        margin-left: 12px;
    }

    .header-right {
        margin-left: auto
    }

    .rbt-main-navigation .mainmenu li.submenu-open>.submenu,
    .rbt-main-navigation .mainmenu li.submenu-open>.rbt-megamenu {
        display: block !important;
    }

    .popup-mobile-menu .rbt-megamenu,
    .popup-mobile-menu .submenu {
        display: none;
    }

    .popup-mobile-menu li.mobile-open>.rbt-megamenu,
    .popup-mobile-menu li.mobile-open>.submenu {
        display: block;
    }

    .popup-mobile-menu .mobile-sub-toggle {
        background: transparent;
        border: none;
        color: inherit;
        margin-left: 8px;
        font-size: 16px
    }

    /* Responsive fixes - squeeze menu at 1200-1279px */
    @media (min-width: 1200px) and (max-width: 1399px) {
        .rbt-main-navigation .mainmenu > li {
            margin-left: 4px;
        }
        .rbt-main-navigation .mainmenu li > a {
            font-size: 13px;
            padding: 6px 4px;
        }
        .rbt-btn-wrapper.ml-5 {
            display: none !important;
        }
    }
    
    @media (min-width: 1400px) {
        .rbt-main-navigation .mainmenu > li {
            margin-left: 10px;
        }
        .rbt-main-navigation .mainmenu li > a {
            font-size: 14px;
            padding: 8px 6px;
        }
        .rbt-btn-wrapper.ml-5 {
            margin-left: 16px !important;
        }
    }
</style>

<header class="rbt-header rbt-header-9">
    <div class="rbt-header-wrapper header-not-transparent header-sticky">
        <div class="container">
            <div class="mainbar-row rbt-navigation-start align-items-center justify-content-between">
                <!-- Logo -->
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo logo-dark">
                            <a href="{{ route('marketplace') }}">
                                <video autoplay muted loop playsinline class="logo-video" id="logo-video-dark">
                                    <source src="{{ asset('assets/images/logo/logo-animation-dark.webm') }}"
                                        type="video/webm">
                                    <source src="{{ asset('assets/images/logo/logo-animation-dark.mp4') }}"
                                        type="video/mp4">
                                </video>
                            </a>
                        </div>
                        <div class="logo d-none logo-light">
                            <a href="{{ route('marketplace') }}"><img
                                    src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Logo"></a>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="header-right d-flex align-items-center">
                    <div class="rbt-main-navigation d-none d-xl-block">
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu">
                                {{-- <li class="with-megamenu has-menu-child-item position-static"><a href="{{ route('marketplace') }}">Home</a></li> --}}

                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">Study Abroad <i class="feather-chevron-down"></i></a>
                                    <div class="submenu">
                                        <div class="wrapper" style="width:88%;">
                                            <div class="row row--15">
                                                <div class="col-12">
                                                    @php $countries = DB::table('countries')->orderBy('name')->get(); @endphp
                                                    <ul class="mega-menu-item"
                                                        style="list-style:none; padding:0; margin:0; columns:1;">
                                                        @forelse($countries as $country)
                                                            <li style="break-inside:avoid; margin-bottom:.5rem;"><a
                                                                    href="{{ route('courseFilterOneToggle', ['country' => $country->slug ?? $country->id]) }}">Study
                                                                    In {{ $country->name }}</a></li>
                                                        @empty
                                                            <li class="text-muted p-2">No study destinations available.
                                                            </li>
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">Services <i class="feather-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('services.admission') }}">Admissions</a></li>
                                        <li><a href="{{ route('services.scholarship') }}">Scholarships</a></li>
                                        <li><a href="{{ route('services.visa-guidance') }}">Visa Guidance</a></li>
                                        <li><a href="{{ route('services.departure-guidance') }}">DepartureRegistration</a></li>
                                        <li><a href="{{ route('services.ielts-registration') }}">IELTS Registration</a></li>
                                        <li><a href="{{ route('services.career-counsel') }}">Career Counseling</a></li>
                                    </ul>
                                </li>

                                <li class="has-dropdown has-menu-child-item">
                                    <a href="#">Resources <i class="feather-chevron-down"></i></a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('resources.event') }}">Events</a></li>
                                        <li><a href="{{ route('blog') }}">Blogs</a></li>
                                        <li><a href="{{ route('resources.top-university') }}">Top Universities</a></li>
                                        <li><a href="{{ route('resources.popular-subject') }}">Popular Subjects</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="with-megamenu has-menu-child-item position-static"><a
                                        href="{{ route('marketplace') }}">Future Career</a></li>
                                {{-- <li class="has-dropdown has-menu-child-item">
                                    <a href="#">About
                                        <i class="feather-chevron-down"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        <li><a href="{{ route('about') }}">IELTS Registration</a></li>

                                    </ul>
                                </li> --}}
                                <li class="with-megamenu has-menu-child-item position-static"><a
                                        href="{{ route('about') }}">About Us</a></li>

                                <li class="with-megamenu has-menu-child-item position-static"><a
                                        href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Find Course CTA -->
                    <div class="rbt-btn-wrapper d-none d-xl-block ml-5">
                        <a class="rbt-btn rbt-switch-btn btn-gradient btn-sm"
                            href="{{ route('courseFilterOneOpen') }}">FIND COURSE</a>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <div class="mobile-menu-bar d-block d-xl-none ms-3">
                        <button class="hamberger-button rbt-round-btn"><i class="feather-menu"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Popup Menu (single instance) -->
<div class="popup-mobile-menu" aria-hidden="true">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content d-flex align-items-center justify-content-between">
                <div class="logo">
                    <a href="{{ route('marketplace') }}"><img src="{{ asset('assets/images/logo/logo.png') }}"
                            alt="Logo" style="height:42px;"></a>
                </div>
                <div class="rbt-btn-close"><button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <p class="description">Make Your Abroad Study Dream Come True.</p>
            <ul class="navbar-top-left rbt-information-list justify-content-start">
                <li><a href="mailto:info@kmfglobaleducation.com"><i class="feather-mail"></i>
                        info@kmfglobaleducation.com</a></li>
                <li><a href="#"><i class="feather-phone"></i> +880 1671135988</a></li>
            </ul>
        </div>

        <nav class="mainmenu-nav">
            <ul class="mainmenu">
                <li><a href="{{ route('marketplace') }}">Home</a></li>
                <li>
                    <a href="#">Study Abroad <i class="feather-chevron-down"></i></a>
                    <div class="rbt-megamenu grid-item-2">
                        <div class="wrapper" style="width:88%;">
                            <div class="row row--15">
                                <div class="col-12">
                                    @php $countriesMobile = DB::table('countries')->orderBy('name')->get(); @endphp
                                    <ul class="mega-menu-item">
                                        @foreach ($countriesMobile as $country)
                                            <li><a
                                                    href="{{ route('courseFilterOneToggle', ['country' => $country->slug ?? $country->id]) }}">Study
                                                    In {{ $country->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li><a href="{{ route('services.admission') }}">Admissions</a></li>
                <li><a href="{{ route('blog') }}">Blogs</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>

        <div class="mobile-menu-bottom">
            <div class="rbt-btn-wrapper mb--20"><a class="rbt-btn btn-border-gradient radius-round btn-sm w-100"
                    href="{{ route('courseFilterOneOpen') }}">FIND COURSE</a></div>
            <div class="social-share-wrapper">
                <span class="rbt-short-title d-block">Follow Us</span>
                <ul class="social-icon social-default transparent-with-border mt--20">
                    <li><a href="#"><i class="feather-facebook"></i></a></li>
                    <li><a href="#"><i class="feather-twitter"></i></a></li>
                    <li><a href="#"><i class="feather-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Offcanvas Side Menu (single instance) -->
<div class="rbt-offcanvas-side-menu rbt-category-sidemenu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="inner-title">
                <h4 class="title">Course Category</h4>
            </div>
            <div class="rbt-btn-close">
                <button class="rbt-close-offcanvas rbt-round-btn"><i class="feather-x"></i></button>
            </div>
        </div>
        <nav class="side-nav w-100">
            <ul class="rbt-vertical-nav-list-wrapper vertical-nav-menu">
                <li class="vertical-nav-item">
                    <a href="#">Course School</a>
                    <div class="vartical-nav-content-menu-wrapper">
                        <div class="vartical-nav-content-menu">
                            <h3 class="rbt-short-title">Course Title</h3>
                            <ul class="rbt-vertical-nav-list-wrapper">
                                <li><a href="#">Web Design</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Figma</a></li>
                                <li><a href="#">Adobe</a></li>
                            </ul>
                        </div>
                        <div class="vartical-nav-content-menu">
                            <h3 class="rbt-short-title">Course Title</h3>
                            <ul class="rbt-vertical-nav-list-wrapper">
                                <li><a href="#">Photo</a></li>
                                <li><a href="#">English</a></li>
                                <li><a href="#">Math</a></li>
                                <li><a href="#">Read</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="read-more-btn">
                <div class="rbt-btn-wrapper mt--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                        href="#">
                        <span>Learn More</span>
                    </a>
                </div>
            </div>
        </nav>
        <div class="rbt-offcanvas-footer"></div>
    </div>
</div>

<a class="rbt-close_side_menu" href="javascript:void(0);"></a>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var popup = document.querySelector('.popup-mobile-menu');
        var openBtn = document.querySelector('.hamberger-button');
        var closeBtn = document.querySelector('.popup-mobile-menu .close-button');

        function openPopup() {
            if (popup) {
                popup.classList.add('active');
                popup.setAttribute('aria-hidden', 'false');
                document.body.classList.add('popup-open');
            }
        }

        function closePopup() {
            if (popup) {
                popup.classList.remove('active');
                popup.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('popup-open');
            }
        }
        openBtn && openBtn.addEventListener('click', function(e) {
            e.preventDefault();
            openPopup();
        });
        closeBtn && closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            closePopup();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePopup();
            }
        });
        document.addEventListener('click', function(e) {
            if (popup && popup.classList.contains('active') && !popup.contains(e.target) && !e.target
                .closest('.hamberger-button')) {
                closePopup();
            }
        });

        // Desktop keyboard accessibility for dropdowns
        var dropdownLinks = document.querySelectorAll(
            '.rbt-main-navigation .mainmenu li.has-dropdown > a, .rbt-main-navigation .mainmenu li.with-megamenu > a'
            );
        dropdownLinks.forEach(function(link) {
            link.setAttribute('tabindex', '0');
            link.setAttribute('aria-expanded', 'false');
            link.addEventListener('keydown', function(e) {
                var li = this.parentElement;
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    li.classList.toggle('submenu-open');
                    this.setAttribute('aria-expanded', li.classList.contains('submenu-open') ?
                        'true' : 'false');
                }
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    var sub = li.querySelector('.submenu, .rbt-megamenu');
                    if (sub) {
                        var first = sub.querySelector('a');
                        first && first.focus();
                    }
                }
                if (e.key === 'Escape') {
                    li.classList.remove('submenu-open');
                    this.setAttribute('aria-expanded', 'false');
                }
            });
            link.addEventListener('blur', function() {
                var li = this.parentElement;
                setTimeout(function() {
                    if (!li.contains(document.activeElement)) {
                        li.classList.remove('submenu-open');
                        link.setAttribute('aria-expanded', 'false');
                    }
                }, 150);
            });
        });

        // Mobile popup: add small toggles for submenu items
        if (popup) {
            popup.querySelectorAll('li').forEach(function(li) {
                var sub = li.querySelector('.rbt-megamenu, .submenu');
                if (sub) {
                    var btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'mobile-sub-toggle';
                    btn.setAttribute('aria-expanded', 'false');
                    btn.innerHTML = '<i class="feather-chevron-down"></i>';
                    var title = li.querySelector('a');
                    title && title.after(btn);
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        li.classList.toggle('mobile-open');
                        btn.setAttribute('aria-expanded', li.classList.contains('mobile-open'));
                    });
                }
            });
        }
    });
</script>
