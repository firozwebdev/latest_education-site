@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
@endphp

@section('content')


    @include('frontend-partials.header')

    <!-- Start Side Vav -->
    <x-sideVav/>
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start Banner Area  -->
    <div class="slider-area rbt-banner-10 height-750 bg_image bg_image--11" data-black-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <div class="section-title mb--20">
                            <span class="subtitle bg-coral-opacity">How We Work</span>
                        </div>
                        <h1 class="title display-one text-white">Take Challenge for Build Your Life. <br>The World Most
                            Lessons for Back to Your Life.</h1>
                        <div class="read-more-btn mt--40">
                            <a class="rbt-btn btn-gradient hover-icon-reverse" href="#">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">More About Us</span>
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
    <!-- End Banner Area  -->

    <!-- Start About Area  -->
    <div class="rbt-about-area about-style-1 bg-color-white rbt-section-gapTop">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="thumbnail-wrapper">
                        <div class="thumbnail image-1">
                            <img data-parallax='{"x": 0, "y": -20}' src="{{ asset('assets/images/about/about-07.jpg') }}" alt="Education Images">
                        </div>
                        <div class="thumbnail image-2 d-none d-xl-block">
                            <img data-parallax='{"x": 0, "y": 60}' src="{{ asset('assets/images/about/about-09.jpg') }}" alt="Education Images">
                        </div>
                        <div class="thumbnail image-3 d-none d-md-block">
                            <img data-parallax='{"x": 0, "y": 80}' src="{{ asset('assets/images/about/about-08.jpg') }}" alt="Education Images">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner pl--50 pl_sm--0 pl_md--0">
                        <div class="section-title text-start">
                            <span class="subtitle bg-coral-opacity">Know About Us</span>
                            <h2 class="title">Know About Histudy <br /> Learning Platform</h2>
                        </div>
                        <p class="description mt--30">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                        <!-- Start Feature List  -->
                        <div class="rbt-feature-wrapper mt--40">

                            <div class="rbt-feature feature-style-1">
                                <div class="icon bg-pink-opacity">
                                    <i class="feather-heart"></i>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-title">Flexible Classes</h6>
                                    <p class="feature-description">It is a long established fact that a reader will
                                        be distracted by this on readable content of when looking at its layout.</p>
                                </div>
                            </div>

                            <div class="rbt-feature feature-style-1">
                                <div class="icon bg-primary-opacity">
                                    <i class="feather-book"></i>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-title">Learn From Anywhere</h6>
                                    <p class="feature-description">Sed distinctio repudiandae eos recusandae laborum eaque non eius iure suscipit laborum eaque non eius iure suscipit.</p>
                                </div>
                            </div>

                            <div class="rbt-feature feature-style-1">
                                <div class="icon bg-coral-opacity">
                                    <i class="feather-monitor"></i>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-title">Experienced Teacher's service.</h6>
                                    <p class="feature-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, aliquid mollitia Officia, aliquid mollitia.</p>
                                </div>
                            </div>
                        </div>

                        <!-- End Feature List  -->
                        <div class="about-btn mt--40">
                            <a class="rbt-btn btn-gradient hover-icon-reverse" href="#">
                                <span class="icon-reverse-wrapper">
                            <span class="btn-text">More About Us</span>
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
    <!-- End About Area  -->

    <!-- Start Button Area  -->
    <div class="rbt-video-area rbt-section-gapBottom pt--50 bg-color-white">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="inner pr--50">
                        <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">How We Work</span>
                            <h2 class="title">Build your Career And Upgrade Your Life</h2>
                            <p class="description mt--30">Far far away, behind the word mountains, far from the
                                countries Vokalia and Consonantia, there live the blind texts. Separated they live in
                                Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            <div class="read-more-btn">
                                <a class="rbt-moderbt-btn" href="#">
                                    <span class="moderbt-btn-text">Learn More About Us</span>
                                    <i class="feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="video-popup-wrapper">
                        <img class="w-100 rbt-radius" src="{{ asset('assets/images/others/video-01.jpg') }}" alt="Video Images">
                        <a class="popup-video position-to-top" href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
                            <span><img src="{{ asset('assets/images/icons/youtube.png') }}" alt=""></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Button Area  -->

     @include('frontend-partials.footer')

@endsection
