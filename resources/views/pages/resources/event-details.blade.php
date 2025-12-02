@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
     $bodyClass='';
@endphp

@section('content')

    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <div class="logo logo-dark">
                            <a href="#">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                            </a>
                        </div>

                        <div class="logo d-none logo-light">
                            <a href="#">
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>


                    <li class="with-megamenu has-menu-child-item">
                        <a href="#">Events <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-2">
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mega-top-banner">
                                            <div class="content">
                                                <h4 class="title">Developer hub</h4>
                                                <p class="description">Start building fast, with code samples, key resources and more.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-6 col-xxl-6 single-mega-item">
                                        <h3 class="rbt-short-title">event Layout</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="#">Filter One Toggle</a></li>
                                            <li><a href="#">Filter One Open</a></li>
                                            <li><a href="#">Filter Two Toggle</a></li>
                                            <li><a href="#">Filter Two Open</a></li>
                                            <li><a href="#">event With Tab</a></li>
                                            <li><a href="#">event With Tab Two</a></li>
                                            <li><a href="#">event Card Two</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-xl-6 col-xxl-6 single-mega-item">
                                        <h3 class="rbt-short-title">event Layout</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="#">Filter One Toggle</a></li>
                                            <li><a href="#">Filter One Open</a></li>
                                            <li><a href="#">Filter Two Toggle</a></li>
                                            <li><a href="#">Filter Two Open</a></li>
                                            <li><a href="#">event With Tab</a></li>
                                            <li><a href="#">event With Tab Two</a></li>
                                            <li><a href="#">event Card Two</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav-quick-access">
                                            <li><a href="#"><i class="feather-folder-minus"></i> Quick Start Guide</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> For Open Source</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> API Status</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> Support</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">Dashboard
                            <i class="feather-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            <li class="has-dropdown"><a href="#">Instructor Dashboard</a>
                                <ul class="submenu">
                                    <li><a href="#">Filter One Toggle</a></li>
                                            <li><a href="#">Filter One Open</a></li>
                                            <li><a href="#">Filter Two Toggle</a></li>
                                            <li><a href="#">Filter Two Open</a></li>
                                            <li><a href="#">event With Tab</a></li>
                                            <li><a href="#">event With Tab Two</a></li>
                                            <li><a href="#">event Card Two</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown"><a href="#">Student Dashboard</a>
                                <ul class="submenu">
                                    <li><a href="#">Filter One Toggle</a></li>
                                            <li><a href="#">Filter One Open</a></li>
                                            <li><a href="#">Filter Two Toggle</a></li>
                                            <li><a href="#">Filter Two Open</a></li>
                                            <li><a href="#">event With Tab</a></li>
                                            <li><a href="#">event With Tab Two</a></li>
                                            <li><a href="#">event Card Two</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Pages <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-4">
                            <div class="wrapper">
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('aboutus01') }}">About Us</a></li>
                                            <li><a href="{{ route('aboutus02') }}">About Us 02</a></li>
                                            <li><a href="{{ route('eventGrid') }}">Event Grid</a></li>
                                            <li><a href="{{ route('eventList') }}">Event List</a></li>
                                            <li><a href="{{ route('eventSidebar') }}">Event Sidebar</a></li>
                                            <li><a href="{{ route('eventDetails') }}">Event Details</a></li>
                                            <li><a href="{{ route('academyGallery') }}">Academy Gallery</a></li>
                                            <li><a href="{{ route('admissionGuide') }}">Admission Guide</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('profile') }}">Profile</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                            <li><a href="{{ route('becomeTeacher') }}">Become a Teacher</a></li>
                                            <li><a href="{{ route('instructor') }}">Instructor</a></li>
                                            <li><a href="{{ route('faqs') }}">FAQS</a></li>
                                            <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                                            <li><a href="{{ route('pageError') }}">404 Page</a></li>
                                            <li><a href="{{ route('maintenance') }}">Maintenance</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Shop Pages</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('shop') }}">Shop <span class="rbt-badge-card">Sale Anything</span></a></li>
                                            <li><a href="{{ route('singleProduct') }}">Single Product</a></li>
                                            <li><a href="{{ route('cart') }}">Cart Page</a></li>
                                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                            <li><a href="{{ route('wishlist') }}">Wishlist Page</a></li>
                                            <li><a href="{{ route('myAccount') }}">My Acount</a></li>
                                            <li><a href="{{ route('login') }}">Login & Register</a></li>
                                            <li><a href="{{ route('subscription') }}">Subscription</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <div class="mega-category-item">
                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/event/category-2.png') }}" alt="event images"></div>
                                                    <a href="{{ route('eventFilterOneToggle') }}">
                                                        <span>Online Education</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/event/category-1.png') }}" alt="event images"></div>
                                                    <a href="{{ route('eventFilterOneToggle') }}">
                                                        <span>Language Club</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/event/category-4.png') }}" alt="event images"></div>
                                                    <a href="{{ route('eventFilterOneToggle') }}">
                                                        <span>University Status</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <a href="{{ route('eventFilterOneToggle') }}">
                                                        <span>event School</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/event/category-9.png') }}" alt="event images"></div>
                                                    <a href="{{ route('eventFilterOneToggle') }}">
                                                        <span>Academy</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Elements <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-3">
                            <div class="wrapper">
                                <div class="row row--15 single-dropdown-menu-presentation">
                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('styleGuide') }}">Style Guide <span class="rbt-badge-card">Hot</span></a></li>
                                            <li><a href="{{ route('accordion') }}">Accordion</a></li>
                                            <li><a href="{{ route('advancetab') }}">Advance Tab</a></li>
                                            <li><a href="{{ route('about') }}">About <span class="rbt-badge-card">New</span></a></li>
                                            <li><a href="{{ route('brand') }}">Brand</a></li>
                                            <li><a href="{{ route('button') }}">Button</a></li>
                                            <li><a href="{{ route('badge') }}">Badge</a></li>
                                            <li><a href="{{ route('card') }}">Card</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('callToAction') }}">Call To Action</a></li>
                                            <li><a href="{{ route('counterup') }}">Counter</a></li>
                                            <li><a href="{{ route('category') }}">Categories</a></li>
                                            <li><a href="{{ route('header') }}">Header Style</a></li>
                                            <li><a href="{{ route('newsletter') }}">Newsletter</a></li>
                                            <li><a href="{{ route('team') }}">Team</a></li>
                                            <li><a href="{{ route('social') }}">Social</a></li>
                                            <li><a href="{{ route('listStyle') }}">List Style</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                            <li><a href="{{ route('pricing') }}">Pricing</a></li>
                                            <li><a href="{{ route('progressbar') }}">Progressbar</a></li>
                                            <li><a href="{{ route('testimonial') }}">Testimonial</a></li>
                                            <li><a href="{{ route('service') }}">Service</a></li>
                                            <li><a href="{{ route('split') }}">Split Area</a></li>
                                            <li><a href="{{ route('search') }}">Search Style</a></li>
                                            <li><a href="{{ route('instagram') }}">Instagram Style</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-wrapper">
                                            <a class="rbt-btn btn-gradient hover-icon-reverse square btn-xl w-100 text-center mt--30 hover-transform-none" href="#">
                                                <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Visit Histudy Template</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Blog <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-3">
                            <div class="wrapper">
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <h3 class="rbt-short-title">Blog Styles</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('blogList') }}">Blog List</a></li>
                                            <li><a href="{{ route('blog') }}">Blog Grid</a></li>
                                            <li><a href="{{ route('blogGridMinimal') }}">Blog Grid Minimal</a></li>
                                            <li><a href="{{ route('blogWithSidebar') }}">Blog With Sidebar</a></li>
                                            <li><a href="{{ route('blogDetails') }}">Blog Details</a></li>
                                            <li><a href="{{ route('postFormatStandard') }}">Post Format Standard</a></li>
                                            <li><a href="{{ route('postFormatGallery') }}">Post Format Gallery</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('postFormatQuote') }}">Post Format Quote</a></li>
                                            <li><a href="{{ route('postFormatAudio') }}">Post Format Audio</a></li>
                                            <li><a href="{{ route('postFormatVideo') }}">Post Format Video</a></li>
                                            <li><a href="#">Media Under Title <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Sticky Sidebar <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Auto Masonry <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Meta Overlaid <span class="rbt-badge-card">Coming</span></a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <div class="rbt-ads-wrapper">
                                            <a class="d-block" href="#"><img src="{{ asset('assets/images/service/mobile-cat.jpg') }}" alt="Education Images"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>
                </ul>
            </nav>

            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="#">
                        <span>Enroll Now</span>
                    </a>
                </div>

                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">Find With Us</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                        <li><a href="https://www.facebook.com/">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://www.twitter.com">
                                <i class="feather-twitter"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.linkdin.com/">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Start Side Vav -->
    <x-sideVav/>
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">
            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top rbt-breadcrumb-style-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="content text-center">

                                <div class="d-flex align-items-center flex-wrap justify-content-center mb--15 rbt-event-details-feature">
                                    <div class="feature-sin best-seller-badge">
                                        <span class="rbt-badge-2">
                                                <span class="image"><img src="{{ asset('assets/images/icons/card-icon-1.png') }}"
                                                        alt="Best Seller Icon"></span> Bestseller
                                        </span>
                                    </div>
                                    <div class="feature-sin rating">
                                        <a href="#">{{ number_format($event->rating ?? 0, 1) }}</a>
                                        @for($i=0;$i<5;$i++)
                                            <a href="#"><i class="fa fa-star {{ $i < round((float)($event->rating ?? 0)) ? 'text-warning' : 'text-muted' }}"></i></a>
                                        @endfor
                                    </div>
                                    <div class="feature-sin total-rating">
                                        @php
                                            $enrolledCount = (int) ($event->enrolled ?? 0);
                                            $ratingValue = (float) ($event->rating ?? 0);
                                            $totalRating = max(1, intval($enrolledCount * $ratingValue));
                                        @endphp
                                        <a class="rbt-badge-4" href="#">{{ number_format($totalRating, 0) }} rating</a>
                                    </div>
                                    <div class="feature-sin total-student">
                                        <span>{{ number_format($event->enrolled ?? 0) }} students</span>
                                    </div>
                                </div>
                                <h2 class="title theme-gradient">{{ $event->event_name }}</h2>

                                <div class="rbt-author-meta mb--20 justify-content-center">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ optional($event->instructor)->avatar ? asset(optional($event->instructor)->avatar) : asset('assets/images/client/avatar-02.png') }}" alt="{{ optional($event->instructor)->name ?? 'Instructor' }}">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        By <a href="{{ route('profile') }}">{{ optional($event->instructor)->name ?? 'Instructor' }}</a>
                                        @if($event->university)
                                            In <a href="#">{{ $event->university->university_name }}</a>
                                        @endif
                                    </div>
                                </div>

                                <ul class="rbt-meta">
                                    <li><i class="feather-calendar"></i>Last updated {{ optional($event->updated_at)->format('m/Y') ?? '' }}</li>
                                    <li><i class="feather-globe"></i>{{ $event->language ?? 'English' }}</li>
                                    <li><i class="feather-award"></i>{{ $event->certificate ? 'Certified event' : 'No Certificate' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="inner">
            <div class="container">
                <div class="col-lg-12">
                    <!-- Start Viedo Wrapper  -->
                    <a class="video-popup-with-text video-popup-wrapper text-center popup-video mb--15" href="{{ $event->preview_video_url ?? 'javascript:void(0);' }}">
                        <div class="video-content">
                            <img class="w-100 rbt-radius" src="{{ $event->images ? asset($event->images) : asset('assets/images/others/video-07.jpg') }}" alt="Video Images">
                            <div class="position-to-top">
                                <span class="rbt-btn rounded-player-2 with-animation">
                                        <span class="play-icon"></span>
                                </span>
                            </div>
                            <span class="play-view-text d-block color-white"><i class="feather-eye"></i> Preview this event</span>
                        </div>
                    </a>
                    <!-- End Viedo Wrapper  -->

                    <div class="row row--30 gy-5 pt--60">

                        <div class="col-lg-4">
                            <div class="event-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                                <div class="inner">
                                    <div class="content-item-content">
                                            <div class="rbt-price-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                            <div class="rbt-price">
                                                <span class="current-price">${{ number_format($event->current_price ?? 0, 2) }}</span>
                                                <span class="off-price">${{ number_format($event->off_price ?? 0, 2) }}</span>
                                            </div>
                                            <div class="discount-time">
                                                <span class="rbt-badge color-danger bg-color-danger-opacity"><i
                                                            class="feather-clock"></i> 3 days left!</span>
                                            </div>
                                        </div>

                                        <div class="add-to-card-button mt--15">
                                            <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="#">
                                                <span class="btn-text">Add to Cart</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </a>
                                        </div>

                                        <div class="buy-now-btn mt--15">
                                            <a class="rbt-btn btn-border icon-hover w-100 d-block text-center" href="#">
                                                <span class="btn-text">Buy Now</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </a>
                                        </div>

                                        <span class="subtitle"><i class="feather-rotate-ccw"></i> 30-Day Money-Back
                                                Guarantee</span>


                                        <div class="rbt-widget-details has-show-more">
                                            <ul class="has-show-more-inner-content rbt-event-details-list-wrapper">
                                                <li><span>Start Date</span><span class="rbt-feature-value rbt-badge-5">{{ $event->next_intake ?? 'TBA' }}</span>
                                                </li>
                                                <li><span>Enrolled</span><span class="rbt-feature-value rbt-badge-5">{{ $event->enrolled }}</span></li>
                                                <li><span>Lectures</span><span class="rbt-feature-value rbt-badge-5">{{ $event->lectures }}</span></li>
                                                <li><span>Skill Level</span><span class="rbt-feature-value rbt-badge-5">{{ $event->student_level }}</span></li>
                                                <li><span>Language</span><span class="rbt-feature-value rbt-badge-5">{{ $event->language }}</span></li>
                                                <li><span>Quizzes</span><span class="rbt-feature-value rbt-badge-5">{{ $event->quizzes_count ?? 10 }}</span></li>
                                                <li><span>Certificate</span><span class="rbt-feature-value rbt-badge-5">{{ $event->certificate ? 'Yes' : 'No' }}</span></li>
                                                <li><span>Pass Percentage</span><span class="rbt-feature-value rbt-badge-5">{{ $event->pass_percentage ?? 0 }}%</span></li>
                                            </ul>
                                            <div class="rbt-show-more-btn">Show More</div>
                                        </div>

                                        <div class="social-share-wrapper mt--30 text-center">
                                            <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                                <ul class="social-icon social-default transparent-with-border justify-content-center">
                                                    <li><a href="https://www.facebook.com/">
                                                            <i class="feather-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="https://www.twitter.com">
                                                            <i class="feather-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="https://www.instagram.com/">
                                                            <i class="feather-instagram"></i>
                                                        </a>
                                                    </li>
                                                    <li><a href="https://www.linkdin.com/">
                                                            <i class="feather-linkedin"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr class="mt--20">
                                            <div class="contact-with-us text-center">
                                                <p>For details about the event</p>
                                                <p class="rbt-badge-2 mt--10 justify-content-center w-100"><i class="feather-phone mr--5"></i> Call Us: <a href="#"><strong>+444 555 666 777</strong></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <!-- Start event Details  -->
                            <div class="event-details-content">
                                <div class="rbt-inner-onepage-navigation sticky-top">
                                    <nav class="mainmenu-nav onepagenav">
                                        <ul class="mainmenu">
                                            <li class="current">
                                                <a href="#overview">Overview</a>
                                            </li>
                                            <li>
                                                <a href="#eventcontent">event Content</a>
                                            </li>
                                            <li>
                                                <a href="#details">Details</a>
                                            </li>
                                            <li>
                                                <a href="#intructor">Intructor</a>
                                            </li>
                                            <li>
                                                <a href="#review">Review</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <!-- Start event Feature Box  -->
                                <div class="rbt-event-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more" id="overview">
                                        <div class="rbt-event-feature-inner has-show-more-inner-content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">What you'll learn</h4>
                                        </div>
                                        <p>{{ Str::limit($event->description ?? 'No description available for this event yet.', 400) }}</p>

                                        <div class="row g-5 mb--30">
                                            <!-- Start Feture Box  -->
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Become an advanced, confident, and
                                                        modern
                                                        JavaScript developer from scratch.</li>
                                                    <li><i class="feather-check"></i>Have an intermediate skill level of
                                                        Python
                                                        programming.</li>
                                                    <li><i class="feather-check"></i>Have a portfolio of various data
                                                        analysis
                                                        projects.</li>
                                                    <li><i class="feather-check"></i>Use the numpy library to create and
                                                        manipulate
                                                        arrays.</li>
                                                </ul>
                                            </div>
                                            <!-- End Feture Box  -->

                                            <!-- Start Feture Box  -->
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Use the Jupyter Notebook
                                                        Environment.
                                                        JavaScript developer from scratch.</li>
                                                    <li><i class="feather-check"></i>Use the pandas module with Python
                                                        to create and
                                                        structure data.</li>
                                                    <li><i class="feather-check"></i>Have a portfolio of various data
                                                        analysis
                                                        projects.</li>
                                                    <li><i class="feather-check"></i>Create data visualizations using
                                                        matplotlib and
                                                        the seaborn.</li>
                                                </ul>
                                            </div>
                                            <!-- End Feture Box  -->
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis, aliquam
                                            voluptas laudantium incidunt architecto nam excepturi provident rem laborum
                                            repellendus placeat neque aut doloremque ut ullam, veritatis nesciunt iusto
                                            officia alias, non est vitae. Eius repudiandae optio quam alias aperiam nemo
                                            nam tempora, dignissimos dicta excepturi ea quo ipsum omnis maiores
                                            perferendis commodi voluptatum facere vel vero. Praesentium quisquam iure
                                            veritatis, perferendis adipisci sequi blanditiis quidem porro eligendi
                                            fugiat facilis inventore amet delectus expedita deserunt ut molestiae modi
                                            laudantium, quia tenetur animi natus ea. Molestiae molestias ducimus
                                            pariatur et consectetur. Error vero, eum soluta delectus necessitatibus
                                            eligendi numquam hic at?</p>
                                    </div>
                                    <div class="rbt-show-more-btn">Show More</div>
                                </div>
                                <!-- End event Feature Box  -->

                                <!-- Start event Content  -->
                                <div class="event-content rbt-shadow-box eventcontent-wrapper mt--30" id="eventcontent">
                                    <div class="rbt-event-feature-inner">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">event Content</h4>
                                        </div>
                                        <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                            <div class="accordion" id="accordionExampleb2">

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo1">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo1">
                                                            Intro to event and Histudy <span class="rbt-badge-5 ml--10">1hr 30min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo1" class="accordion-collapse collapse show" aria-labelledby="headingTwo1" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-event-main-content liststyle">
                                                                <li>
                                                                        @foreach(json_decode($event->syllabus ?? '[]') as $item)
                                                                        <a href="{{ route('lesson') }}">
                                                                            <div class="event-content-left">
                                                                                <i class="feather-play-circle"></i> <span
                                                                                        class="text">{{ $item->title }}</span>
                                                                            </div>
                                                                            <div class="event-content-right">
                                                                                <span class="min-lable">{{ $item->duration }}</span>
                                                                                <span class="rbt-badge variation-03 bg-primary-opacity"><i class="feather-eye"></i> Preview</span>
                                                                            </div>
                                                                        </a>
                                                                        @endforeach
                                                                </li>

                                                                <li>
                                                                    <a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Watch Before Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="min-lable">0.5 min</span>
                                                                            <span class="rbt-badge variation-03 bg-primary-opacity"><i class="feather-eye"></i> Preview</span>
                                                                        </div>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo2">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                                            event Fundamentals <span class="rbt-badge-5 ml--10">2hr 30min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-event-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">event Intro</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo3">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                                                            You can develop skill and setup <span class="rbt-badge-5 ml--10">1hr 50min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo3" class="accordion-collapse collapse" aria-labelledby="headingTwo3" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-event-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">event Intro</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo4">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                                                            15 Things To Know About Education? <span class="rbt-badge-5 ml--10">2hr 60min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo4" class="accordion-collapse collapse" aria-labelledby="headingTwo4" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-event-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">event Intro</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo5">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5">
                                                            event Description <span class="rbt-badge-5 ml--10">2hr 20min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo5" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-event-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">event Intro</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="event-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="event-content-right">
                                                                            <span class="event-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End event Content  -->

                                <!-- Start event Feature Box  -->
                                <div class="rbt-event-feature-box rbt-shadow-box details-wrapper mt--30" id="details">
                                    <div class="row g-5">
                                        <!-- Start Feture Box  -->
                                        <div class="col-lg-6">
                                            <div class="section-title">
                                                <h4 class="rbt-title-style-3 mb--20">Requirements</h4>
                                            </div>
                                            <ul class="rbt-list-style-1">
                                                <li><i class="feather-check"></i>Become an advanced, confident, and modern
                                                    JavaScript developer from scratch.</li>
                                                <li><i class="feather-check"></i>Have an intermediate skill level of Python
                                                    programming.</li>
                                                <li><i class="feather-check"></i>Have a portfolio of various data analysis
                                                    projects.</li>
                                                <li><i class="feather-check"></i>Use the numpy library to create and manipulate
                                                    arrays.</li>
                                            </ul>
                                        </div>
                                        <!-- End Feture Box  -->

                                        <!-- Start Feture Box  -->
                                        <div class="col-lg-6">
                                            <div class="section-title">
                                                <h4 class="rbt-title-style-3 mb--20">Description</h4>
                                            </div>
                                            <ul class="rbt-list-style-1">
                                                <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.
                                                    JavaScript developer from scratch.</li>
                                                <li><i class="feather-check"></i>Use the pandas module with Python to create and
                                                    structure data.</li>
                                                <li><i class="feather-check"></i>Have a portfolio of various data analysis
                                                    projects.</li>
                                                <li><i class="feather-check"></i>Create data visualizations using matplotlib and
                                                    the seaborn.</li>
                                            </ul>
                                        </div>
                                        <!-- End Feture Box  -->
                                    </div>
                                </div>
                                <!-- End event Feature Box  -->

                                <!-- Start Intructor Area  -->
                                        <div class="rbt-instructor rbt-shadow-box intructor-wrapper mt--30" id="intructor">
                                    <div class="about-author border-0 pb--0 pt--0">
                                        <div class="section-title mb--30">
                                            <h4 class="rbt-title-style-3">Instructor</h4>
                                        </div>
                                        <div class="media align-items-center">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/testimonial/testimonial-7.jpg') }}" alt="Author Images">
                                                </a>
                                            </div>
                                                <div class="media-body">
                                                <div class="author-info">
                                                    <h5 class="title">
                                                        <a class="hover-flip-item-wrapper" href="#">{{ $event->instructor? $event->instructor->name : 'Instructor Name' }}</a>
                                                    </h5>
                                                    <span class="b3 subtitle">{{ $event->instructor? 'Instructor' : '' }}</span>
                                                    <ul class="rbt-meta mb--20 mt--10">
                                                        <li><i class="fa fa-star color-warning"></i>{{ number_format($event->rating,1) }} Reviews <span class="rbt-badge-5 ml--5">{{ $event->rating }}</span></li>
                                                        <li><i class="feather-users"></i>{{ $event->enrolled }} Students</li>
                                                        <li><a href="#"><i class="feather-video"></i>{{ $event->lectures }} events</a></li>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <p class="description">{{ Str::limit($event->description ?? 'John is a brilliant educator', 200) }}</p>

                                                    <ul class="social-icon social-default icon-naked justify-content-start">
                                                        <li><a href="#"><i class="feather-facebook"></i></a></li>
                                                        <li><a href="#"><i class="feather-twitter"></i></a></li>
                                                        <li><a href="#"><i class="feather-instagram"></i></a></li>
                                                        <li><a href="#"><i class="feather-linkedin"></i></a></li>
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Intructor Area  -->

                                <!-- Start Edu Review List  -->
                                <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                                    <div class="event-content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Review</h4>
                                        </div>
                                        <div class="row g-5 align-items-center">
                                            <div class="col-lg-3">
                                                <div class="rating-box">
                                                    <div class="rating-number">5.0</div>
                                                    <div class="rating">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                    </div>
                                                    <span class="sub-title">event Rating</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="review-wrapper">
                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="value-text">63%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="value-text">29%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 6%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="value-text">6%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="value-text">1%</span>
                                                    </div>

                                                    <div class="single-progress-bar">
                                                        <div class="rating-text">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                            </svg>
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="value-text">1%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Edu Review List  -->

                                <div class="about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Featured review</h4>
                                    </div>
                                    <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
                                        @foreach($testimonials as $t)
                                            <div class="rbt-event-review about-author">
                                                <div class="media">
                                                    <div class="thumbnail">
                                                        <a href="#">
                                                            <img src="{{ $t->image ? asset($t->image) : asset('assets/images/testimonial/testimonial-3.jpg') }}" alt="Author Images">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="author-info">
                                                            <h5 class="title">
                                                                <a class="hover-flip-item-wrapper" href="#">
                                                                    {{ $t->name }}
                                                                </a>
                                                            </h5>
                                                            <div class="rating">
                                                                @for($i=0;$i<5;$i++)
                                                                    <a href="#"><i class="fa fa-star {{ $i < round((float)($t->review ?? 5)) ? '' : 'text-muted' }}"></i></a>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <p class="description">{{ Str::limit($t->description ?? $t->review, 150) }}</p>
                                                            <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                                <li><a href="#">
                                                                        <i class="feather-thumbs-up"></i>
                                                                    </a>
                                                                </li>
                                                                <li><a href="#">
                                                                        <i class="feather-thumbs-down"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="rbt-show-more-btn">Show More</div>
                                </div>
                            </div>
                            <!-- End event Details  -->

                            <!-- Start Related event  -->
                            <div class="related-event mt--60">
                                <div class="row g-5 align-items-end mb--40">
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <div class="section-title">
                                            <span class="subtitle bg-pink-opacity">Top event</span>
                                            <h4 class="title">More event By <strong class="color-primary">{{ optional($event->instructor)->name ?? 'Instructor' }}</strong></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="read-more-btn text-start text-md-end">
                                            <a class="rbt-btn rbt-switch-btn btn-border btn-sm" href="#">
                                                <span data-text="View All event">View All event</span>
                                            </a>
                                        <div class="row g-5">
                                            @foreach($relatedevents as $rc)
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                                    <div class="rbt-card variation-01 rbt-hover">
                                                        <div class="rbt-card-img">
                                                            <a href="{{ route('eventDetails2', [$rc->slug ?? $rc->id]) }}">
                                                                <img src="{{ $rc->images ? asset($rc->images) : asset('assets/images/event/event-online-01.jpg') }}" alt="Card image">
                                                                @if(!empty($rc->off_price) && !empty($rc->current_price))
                                                                    @php
                                                                        $offPrice = (float) ($rc->off_price ?? 0);
                                                                        $currentPrice = (float) ($rc->current_price ?? 0);
                                                                        $discountPercent = $offPrice > 0 ? round((1 - ($currentPrice / max(1, $offPrice))) * 100) : 0;
                                                                    @endphp
                                                                    <div class="rbt-badge-3 bg-white">
                                                                        <span>-{{ $discountPercent }}%</span>
                                                                        <span>Off</span>
                                                                    </div>
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="rbt-card-body">
                                                            <div class="rbt-card-top">
                                                                <div class="rbt-review">
                                                                    <div class="rating">
                                                                        @for($i=0;$i<5;$i++)
                                                                            <i class="fas fa-star {{ $i < round((float)($rc->rating ?? 0)) ? '' : 'text-muted' }}"></i>
                                                                        @endfor
                                                                    </div>
                                                                    <span class="rating-count"> ({{ rand(1,40) }} Reviews)</span>
                                                                </div>
                                                                <div class="rbt-bookmark-btn">
                                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                                                </div>
                                                            </div>

                                                            <h4 class="rbt-card-title"><a href="{{ route('eventDetails2', [$rc->slug ?? $rc->id]) }}">{{ $rc->event_name }}</a>
                                                            </h4>

                                                            <ul class="rbt-meta">
                                                                <li><i class="feather-book"></i>{{ $rc->lectures ?? '0' }} Lessons</li>
                                                                <li><i class="feather-users"></i>{{ $rc->enrolled ?? '0' }} Students</li>
                                                            </ul>

                                                            <p class="rbt-card-text">{{ \Illuminate\Support\Str::limit($rc->description ?? 'No description available.', 100) }}</p>
                                                            <div class="rbt-author-meta mb--10">
                                                                <div class="rbt-avater">
                                                                    <a href="#">
                                                                        <img src="{{ optional($rc->instructor)->avatar ? asset(optional($rc->instructor)->avatar) : asset('assets/images/client/avatar-02.png') }}" alt="{{ optional($rc->instructor)->name ?? 'Instructor' }}">
                                                                    </a>
                                                                </div>
                                                                <div class="rbt-author-info">
                                                                    By <a href="{{ route('profile') }}">{{ optional($rc->instructor)->name ?? 'Instructor' }}</a> In <a href="#">{{ optional($rc->university)->university_name ?? 'Category' }}</a>
                                                                </div>
                                                            </div>
                                                            <div class="rbt-card-bottom">
                                                                <div class="rbt-price">
                                                                    <span class="current-price">${{ $rc->current_price ?? '0' }}</span>
                                                                    @if(!empty($rc->off_price))
                                                                        <span class="off-price">${{ $rc->off_price }}</span>
                                                                    @endif
                                                                </div>
                                                                <a class="rbt-btn-link" href="{{ route('eventDetails2', [$rc->slug ?? $rc->id]) }}">Learn
                                                                    More<i class="feather-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->
                                </div>
                            </div>
                            <!-- End Related event  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-separator/>

    <div class="rbt-related-event-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="section-title mb--30">
                <span class="subtitle bg-primary-opacity">More Similar events</span>
                <h4 class="title">Related events</h4>
            </div>
            <div class="row g-5">

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('eventDetails') }}">
                                <img src="{{ asset('assets/images/event/event-online-03.jpg') }}" alt="Card image">
                                <div class="rbt-badge-3 bg-white">
                                    <span>-10%</span>
                                    <span>Off</span>
                                </div>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <div class="rbt-card-top">
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (5 Reviews)</span>
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                </div>
                            </div>
                            <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">Angular Zero to Mastery</a>
                            </h4>
                            <ul class="rbt-meta">
                                <li><i class="feather-book"></i>8 Lessons</li>
                                <li><i class="feather-users"></i>30 Students</li>
                            </ul>
                            <p class="rbt-card-text">Angular Js long fact that a reader will be distracted by
                                the readable.</p>

                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a href="#">Languages</a>
                                </div>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$80</span>
                                    <span class="off-price">$100</span>
                                </div>
                                <a class="rbt-btn-link" href="{{ route('eventDetails') }}">Learn
                                    More<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('eventDetails') }}">
                                <img src="{{ asset('assets/images/event/event-online-04.jpg') }}" alt="Card image">
                                <div class="rbt-badge-3 bg-white">
                                    <span>-40%</span>
                                    <span>Off</span>
                                </div>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <div class="rbt-card-top">
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                </div>
                            </div>

                            <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">Web Front To Back</a>
                            </h4>
                            <ul class="rbt-meta">
                                <li><i class="feather-book"></i>20 Lessons</li>
                                <li><i class="feather-users"></i>40 Students</li>
                            </ul>
                            <p class="rbt-card-text">Web Js long fact that a reader will be distracted by
                                the readable.</p>
                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/client/avater-01.png') }}" alt="Sophia Jaymes">
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a href="{{ route('profile') }}">Patrick</a> In <a href="#">Languages</a>
                                </div>
                            </div>

                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$60</span>
                                    <span class="off-price">$120</span>
                                </div>
                                <a class="rbt-btn-link" href="{{ route('eventDetails') }}">Learn
                                    More<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('eventDetails') }}">
                                <img src="{{ asset('assets/images/event/event-online-05.jpg') }}" alt="Card image">
                                <div class="rbt-badge-3 bg-white">
                                    <span>-20%</span>
                                    <span>Off</span>
                                </div>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <div class="rbt-card-top">
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="rating-count"> (15 Reviews)</span>
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                </div>
                            </div>
                            <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">SQL Beginner Advanced</a>
                            </h4>
                            <ul class="rbt-meta">
                                <li><i class="feather-book"></i>12 Lessons</li>
                                <li><i class="feather-users"></i>50 Students</li>
                            </ul>
                            <p class="rbt-card-text">It is a long established fact that a reader will be
                                distracted
                                by the readable.</p>
                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a href="{{ route('profile') }}">Angela</a> In <a href="#">Development</a>
                                </div>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">$60</span>
                                    <span class="off-price">$120</span>
                                </div>
                                <a class="rbt-btn-link left-icon" href="{{ route('eventDetails') }}"><i
                                            class="feather-shopping-cart"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

            </div>
        </div>
    </div>

    <!-- Start event Action Bottom  -->
    <div class="rbt-event-action-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title text-center text-md-start">
                        <h5 class="title mb--0">The Complete Histudy 2024: From Zero to Expert!</h5>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt_sm--15">
                    <div class="event-action-bottom-right rbt-single-group">
                        <div class="rbt-single-list rbt-price large-size justify-content-center">
                            <span class="current-price color-primary">$750.00</span>
                            <span class="off-price">$1500.00</span>
                        </div>
                        <div class="rbt-single-list action-btn">
                            <a class="rbt-btn btn-gradient hover-icon-reverse btn-md" href="#">
                                <span class="icon-reverse-wrapper">
                                <span class="btn-text">Purchase Now</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End event Action Bottom  -->

    <x-separator/>

@endsection
