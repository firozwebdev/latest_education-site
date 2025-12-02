@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
    $bodyClass = '';
@endphp

@section('content')

    <!-- Start Header Area -->
    @include('frontend-partials.header')


    <!-- Start Side Vav -->
    <x-sideVav />
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

                                <div
                                    class="d-flex align-items-center flex-wrap justify-content-center mb--15 rbt-course-details-feature">
                                    <div class="feature-sin best-seller-badge">
                                        <span class="rbt-badge-2">
                                            <span class="image"><img
                                                    src="{{ asset('assets/images/icons/card-icon-1.png') }}"
                                                    alt="Best Seller Icon"></span> Bestservices
                                        </span>
                                    </div>
                                    <div class="feature-sin rating">
                                        <a href="#">{{ number_format($course->rating ?? 0, 1) }}</a>
                                        @for ($i = 0; $i < 5; $i++)
                                            <a href="#"><i
                                                    class="fa fa-star {{ $i < round((float) ($course->rating ?? 0)) ? 'text-warning' : 'text-muted' }}"></i></a>
                                        @endfor
                                    </div>
                                    <div class="feature-sin total-rating">
                                        @php
                                            $enrolledCount = (int) ($course->enrolled ?? 0);
                                            $ratingValue = (float) ($course->rating ?? 0);
                                            $totalRating = max(1, intval($enrolledCount * $ratingValue));
                                        @endphp
                                        <a class="rbt-badge-4" href="#">{{ number_format($totalRating, 0) }}
                                            rating</a>
                                    </div>
                                    <div class="feature-sin total-student">
                                        <span>{{ number_format($course->enrolled ?? 0) }} students</span>
                                    </div>
                                </div>
                                <h2 class="title theme-gradient">{{ $course->course_name }}</h2>

                                <div class="rbt-author-meta mb--20 justify-content-center">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ optional($course->instructor)->avatar ? asset(optional($course->instructor)->avatar) : asset('assets/images/client/avatar-02.png') }}"
                                                alt="{{ optional($course->instructor)->name ?? 'Instructor' }}">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        {{-- By <a href="{{ route('profile') }}">{{ optional($course->instructor)->name ?? 'Instructor' }}</a> --}}
                                        @if ($course->university)
                                            <a
                                                href="{{ $course->university->website_url }}">{{ $course->university->university_name }}</a>
                                        @endif
                                    </div>
                                </div>

                                <ul class="rbt-meta">
                                    <li><i class="feather-map-pin"></i>{{ $course->city ?? 'Location Not Specified' }}</li>
                                    @if($course->duration)
                                        <li><i class="feather-clock"></i>{{ $course->duration }}</li>
                                    @endif
                                    <li><i class="feather-award"></i>{{ $course->language ?? 'English' }}</li>
                                    <li><i
                                            class="feather-globe"></i>{{ $course->certificate ? 'Certificate Available' : 'No Certificate' }}
                                    </li>
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
                    {{-- <a class="video-popup-with-text video-popup-wrapper text-center popup-video mb--15" href="{{ $course->preview_video_url ?? 'javascript:void(0);' }}">
                        <div class="video-content">
                            <img class="w-100 rbt-radius" src="{{ $course->images ? asset($course->images) : asset('assets/images/others/video-07.jpg') }}" alt="Video Images">
                            <div class="position-to-top">
                                <span class="rbt-btn rounded-player-2 with-animation">
                                        <span class="play-icon"></span>
                                </span>
                            </div>
                            <span class="play-view-text d-block color-white"><i class="feather-eye"></i> Preview this course</span>
                        </div>
                    </a> --}}
                    <!-- End Viedo Wrapper  -->

                    <div class="row row--30 gy-5 pt--60">

                        <div class="col-lg-4">
                            <div class="course-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                                <div class="inner">
                                    <div class="content-item-content">
                                        <div
                                            class="rbt-price-wrapper d-flex flex-wrap align-items-center justify-content-between">
                                            {{-- <div class="rbt-price">
                                                <span class="current-price">${{ number_format($course->current_price ?? 0, 2) }}</span>
                                                <span class="off-price">${{ number_format($course->off_price ?? 0, 2) }}</span>
                                            </div> --}}
                                            {{-- <div class="discount-time">
                                                <span class="rbt-badge color-danger bg-color-danger-opacity"><i
                                                            class="feather-clock"></i> 3 days left!</span>
                                            </div> --}}
                                        </div>



                                        {{-- <div class="buy-now-btn mt--15">
                                            <a class="rbt-btn btn-border icon-hover w-100 d-block text-center" href="#">
                                                <span class="btn-text">Buy Now</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </a>
                                        </div> --}}

                                        {{-- <span class="subtitle"><i class="feather-rotate-ccw"></i> 30-Day Money-Back
                                                Guarantee</span> --}}

                                        <div class="rbt-widget-details">
                                            <ul class="rbt-course-details-list-wrapper">
                                                <li><span>STUDY LEVEL</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->student_level ?? 'Undergraduate' }}</span>
                                                </li>
                                                <li><span>DURATION</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->duration ?? 'N/A' }}</span></li>
                                                <li><span>LECTURES</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->lectures ?? 0 }}
                                                        Lectures</span></li>
                                                <li><span>NEXT INTAKE</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->next_intake ?? 'TBA' }}</span>
                                                </li>
                                                <li><span>TUITION FEES</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->university->country->currency_symbol ?? '$' }}{{ number_format($course->tuition_fees ?? 0, 2) }}</span>
                                                </li>
                                                <li><span>SCHOLARSHIP</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->offer_card_1 ?? 'Available' }}</span>
                                                </li>
                                                <li><span>ENTRY SCORE</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->entry_score ?? 'N/A' }}</span>
                                                </li>
                                                <li><span>WORLD RANKING</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->qs_ranking ?? 'N/A' }}</span>
                                                </li>
                                                <li><span>LOCATION</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->city ?? 'N/A' }}</span>
                                                </li>
                                                <li><span>ACCOMMODATION</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->offer_card_2 ?? 'Available' }}</span>
                                                </li>
                                                <li><span>LANGUAGE</span><span
                                                        class="rbt-feature-value rbt-badge-5">{{ $course->language ?? 'English' }}</span>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="add-to-card-button mt--15">
                                            <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center"
                                                href="#">
                                                <span class="btn-text">APPLY WITH KMF </span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </a>
                                        </div>
                                        <div class="social-share-wrapper mt--30 text-center">
                                            <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                                <ul
                                                    class="social-icon social-default transparent-with-border justify-content-center">
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
                                            {{-- <div class="contact-with-us text-center">
                                                <p>For details about the course</p>
                                                <p class="rbt-badge-2 mt--10 justify-content-center w-100"><i class="feather-phone mr--5"></i> Call Us: <a href="#"><strong>+444 555 666 777</strong></a></p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <!-- Start Course Details  -->
                            <div class="course-details-content">
                                <div class="rbt-inner-onepage-navigation sticky-top">
                                    <nav class="mainmenu-nav onepagenav">
                                        <ul class="mainmenu">
                                            <li class="current">
                                                <a href="#overview">Overview</a>
                                            </li>
                                            <li>
                                                <a href="#coursecontent">Course Content</a>
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

                                <!-- Start Course Feature Box  -->
                                <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                    <div class="rbt-course-feature-inner">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">OVERVIEW - ({!! $course->course_name ?? 'COURSE NAME' !!})</h4>
                                        </div>
                                        <p>{!! Str::limit($course->description ?? 'NOT APPLICABLE', 400) !!}</p>

                                        {{-- Example feature box section (optional) --}}
                                        {{--
        <div class="row g-5 mb--30">
            <div class="col-lg-6">
                <ul class="rbt-list-style-1">
                    <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                    <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                    <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                    <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="rbt-list-style-1">
                    <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                    <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                    <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                </ul>
            </div>
        </div>
        --}}
                                    </div>
                                </div>

                                <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                    <div class="rbt-course-feature-inner">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">ENTRY REQUIREMENTS -
                                                ({{ $course->course_name ?? 'Course Name' }})</h4>
                                        </div>
                                        <p>{{ Str::limit($course->progress_to ?? 'Entry requirements information not available.', 400) }}
                                        </p>

                                        {{-- Example feature box section (optional) --}}
                                        {{--
        <div class="row g-5 mb--30">
            <div class="col-lg-6">
                <ul class="rbt-list-style-1">
                    <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                    <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                    <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                    <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="rbt-list-style-1">
                    <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                    <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                    <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                </ul>
            </div>
        </div>
        --}}
                                    </div>
                                </div>


                                <!-- Start Intructor Area  -->
                                <div class="rbt-instructor rbt-shadow-box intructor-wrapper mt--30" id="intructor">
                                    <div class="about-author border-0 pb--0 pt--0">
                                        <div class="section-title mb--30">
                                            <h4 class="rbt-title-style-3">SUBMIT YOUR APPLICATIONS</h4>
                                        </div>
                                        <div class="media align-items-center">
                                            <div class="thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/testimonial/testimonial-7.png') }}"
                                                        alt="Author Images">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="author-info">
                                                    <h5 class="title">
                                                        <span
                                                            class="b3 subtitle">{{ $course->instructor ? 'Check Eligibility from United Kingdom!!!' : '' }}</span>
                                                    </h5>
                                                    <ul class="rbt-meta mb--20 mt--10">
                                                        <h5 class="title">
                                                            <a class="hover-flip-item-wrapper" href="#">
                                                                CHECK ELIGIBILITY FROM UNITED KINGDOM!!!

                                                            </a>
                                                        </h5>
                                                    </ul>
                                                </div>
                                                <div class="content">
                                                    <p class="description">Let's see if you qualify for this course. Fill
                                                        in the form and we will get back to you as soon as possible</p>
                                                    <ul
                                                        class="social-icon social-default icon-naked justify-content-start">
                                                        <li><a href="#"><i class="feather-facebook"></i></a></li>
                                                        <li><a href="#"><i class="feather-twitter"></i></a></li>
                                                        <li><a href="#"><i class="feather-instagram"></i></a></li>
                                                        <li><a href="#"><i class="feather-linkedin"></i></a></li>
                                                    </ul> </br>
                                                    <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round"
                                                        href="#">
                                                        <div class="icon-reverse-wrapper">
                                                            <span class="btn-text">Check
                                                                Eligibility</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                        </div>
                                                    </a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Intructor Area  -->

                            </div>
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more"
                                id="coursecontent">
                                <div class="rbt-course-feature-inner has-show-more-inner-content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">AVAILABLE INTAKES</h4>
                                    </div>
                                    <p>{{ Str::limit($course->next_intake ?? 'Intake information not available.', 400) }}
                                    </p>

                                    <div class="row g-5 mb--30">
                                        <!-- Start Feture Box  -->
                                        {{-- <div class="col-lg-6">
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
                                            </div> --}}
                                        <!-- End Feture Box  -->

                                        <!-- Start Feture Box  -->
                                        {{-- <div class="col-lg-6">
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
                                            </div> --}}
                                        <!-- End Feture Box  -->
                                    </div>


                                </div>
                                <div class="rbt-show-more-btn">Show More</div>
                            </div>
                            <!-- End Course Feature Box  -->

                            <!-- Start Course Content  -->
                            {{-- <div class="course-content rbt-shadow-box coursecontent-wrapper mt--30" id="coursecontent">
                                    <div class="rbt-course-feature-inner">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Course Content</h4>
                                        </div>
                                        <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                            <div class="accordion" id="accordionExampleb2">

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo1">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo1">
                                                            Intro to Course and Histudy <span class="rbt-badge-5 ml--10">1hr 30min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo1" class="accordion-collapse collapse show" aria-labelledby="headingTwo1" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-course-main-content liststyle">
                                                                <li>
                                                                        @foreach (json_decode($course->syllabus ?? '[]') as $item)
                                                                        <a href="{{ route('lesson') }}">
                                                                            <div class="course-content-left">
                                                                                <i class="feather-play-circle"></i> <span
                                                                                        class="text">{{ $item->title }}</span>
                                                                            </div>
                                                                            <div class="course-content-right">
                                                                                <span class="min-lable">{{ $item->duration }}</span>
                                                                                <span class="rbt-badge variation-03 bg-primary-opacity"><i class="feather-eye"></i> Preview</span>
                                                                            </div>
                                                                        </a>
                                                                        @endforeach
                                                                </li>

                                                                <li>
                                                                    <a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Watch Before Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="min-lable">0.5 min</span>
                                                                            <span class="rbt-badge variation-03 bg-primary-opacity"><i class="feather-eye"></i> Preview</span>
                                                                        </div>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
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
                                                            Course Fundamentals <span class="rbt-badge-5 ml--10">2hr 30min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-course-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Course Intro</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
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
                                                            <ul class="rbt-course-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Course Intro</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
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
                                                            <ul class="rbt-course-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Course Intro</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item card">
                                                    <h2 class="accordion-header card-header" id="headingTwo5">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5">
                                                            Course Description <span class="rbt-badge-5 ml--10">2hr 20min</span>
                                                        </button>
                                                    </h2>
                                                    <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo5" data-bs-parent="#accordionExampleb2">
                                                        <div class="accordion-body card-body pr--0">
                                                            <ul class="rbt-course-main-content liststyle">
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Course Intro</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Why You Should Not Go To
                                                                                    Education.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>


                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-play-circle"></i> <span
                                                                                    class="text">Ten Factors That Affect Education's
                                                                                    Longevity.</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>

                                                                <li><a href="{{ route('lesson') }}">
                                                                        <div class="course-content-left">
                                                                            <i class="feather-file-text"></i> <span
                                                                                    class="text">Read Before You Start</span>
                                                                        </div>
                                                                        <div class="course-content-right">
                                                                            <span class="course-lock"><i class="feather-lock"></i></span>
                                                                        </div>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            <!-- End Course Content  -->

                            <!-- Start Course Feature Box  -->
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more"
                                id="coursecontent">
                                <div class="rbt-course-feature-inner has-show-more-inner-content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">HOW TO APPLY</h4>
                                    </div>
                                    <p>{{ Str::limit($course->offer_card_1 ?? 'Application process information not available.', 400) }}
                                    </p>

                                    <div class="row g-5 mb--30">
                                        <!-- Start Feture Box  -->
                                        {{-- <div class="col-lg-6">
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
                                            </div> --}}
                                        <!-- End Feture Box  -->

                                        <!-- Start Feture Box  -->
                                        {{-- <div class="col-lg-6">
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
                                            </div> --}}
                                        <!-- End Feture Box  -->
                                    </div>


                                </div>
                                <div class="rbt-show-more-btn">Show More</div>
                            </div>
                            <!-- End Course Feature Box  -->
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">RESEARCH & CHOOSE YOUR PROGRAM -
                                            ({{ $course->course_name ?? 'COURSE NAME' }})</h4>
                                    </div>
                                    <p>{{ Str::limit($course->offer_card_2 ?? 'Program research information not available.', 400) }}
                                    </p>

                                    {{-- Example feature box section (optional) --}}
                                    {{--
                                    <div class="row g-5 mb--30">
                                        <div class="col-lg-6">
                                            <ul class="rbt-list-style-1">
                                                <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                                                <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                                                <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                                                <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="rbt-list-style-1">
                                                <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                                                <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                                                <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    --}}
                                </div>
                            </div>

                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">TRACK PROGRESS & ACCEPT YOUR OFFER -
                                            ({{ $course->course_name ?? 'COURSE NAME' }})</h4>
                                    </div>
                                    <p>{{ Str::limit($course->progress_to ?? 'Progress tracking information not available.', 400) }}
                                    </p>

                                    {{-- Example feature box section (optional) --}}
                                    {{--
                                        <div class="row g-5 mb--30">
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                                                    <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                                                    <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                                                    <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                                                    <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                                                    <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        --}}
                                </div>
                            </div>
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">PREPARE YOUR APPLICATION DOCUMENTS -
                                            ({{ $course->course_name ?? 'COURSE NAME' }})</h4>
                                    </div>
                                    <p>{{ Str::limit($course->offer_card_1 ?? 'Document preparation information not available.', 400) }}
                                    </p>

                                    {{-- Example feature box section (optional) --}}
                                    {{--
                                        <div class="row g-5 mb--30">
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                                                    <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                                                    <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                                                    <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                                                    <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                                                    <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        --}}
                                </div>
                            </div>
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">PLAN FUNDING & VISA APPLICATION -
                                            ({{ $course->course_name ?? 'COURSE NAME' }})</h4>
                                    </div>
                                    <p>{{ Str::limit($course->offer_card_2 ?? 'Funding and visa information not available.', 400) }}
                                    </p>

                                    {{-- Example feature box section (optional) --}}
                                    {{--
                                        <div class="row g-5 mb--30">
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                                                    <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                                                    <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                                                    <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                                                    <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                                                    <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        --}}
                                </div>
                            </div>
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">WHY CHOOSE EDUCATION HUB? -
                                            ({{ $course->course_name ?? 'COURSE NAME' }})</h4>
                                    </div>
                                    <p>{{ Str::limit($course->progress_to ?? 'Education hub information not available.', 400) }}
                                    </p>

                                    {{-- Example feature box section (optional) --}}
                                    {{--
                                        <div class="row g-5 mb--30">
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                                                    <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                                                    <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                                                    <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                                                    <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                                                    <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        --}}
                                </div>
                            </div>
                            <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                                <div class="rbt-course-feature-inner">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">SUBMIT YOUR APPLICATION
                                            ({{ $course->course_name ?? ' ' }})</h4>
                                    </div>
                                    <p>{{ Str::limit($course->offer_card_1 ?? 'Application submission information not available.', 400) }}
                                    </p>

                                    {{-- Example feature box section (optional) --}}
                                    {{--
                                        <div class="row g-5 mb--30">
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Become an advanced, confident, and modern JavaScript developer from scratch.</li>
                                                    <li><i class="feather-check"></i>Have an intermediate skill level of Python programming.</li>
                                                    <li><i class="feather-check"></i>Have a portfolio of various data analysis projects.</li>
                                                    <li><i class="feather-check"></i>Use the numpy library to create and manipulate arrays.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="rbt-list-style-1">
                                                    <li><i class="feather-check"></i>Use the Jupyter Notebook Environment.</li>
                                                    <li><i class="feather-check"></i>Use the pandas module with Python to create and structure data.</li>
                                                    <li><i class="feather-check"></i>Create data visualizations using matplotlib and seaborn.</li>
                                                </ul>
                                            </div>
                                        </div>
                                        --}}
                                </div>
                            </div>
                            <!-- Start Edu Review List  -->
                            <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                                <div class="course-content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Accept Your Offer</h4>
                                    </div>
                                    <div class="row g-5 align-items-center">
                                        <div class="col-lg-3">
                                            <div class="rating-box">
                                                <div class="rating-number">5.0</div>
                                                <div class="rating">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                    </svg>
                                                </div>
                                                <span class="sub-title">Course Rating</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="review-wrapper">
                                                <div class="single-progress-bar">
                                                    <div class="rating-text">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 63%"
                                                            aria-valuenow="63" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <span class="value-text">63%</span>
                                                </div>

                                                <div class="single-progress-bar">
                                                    <div class="rating-text">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 29%"
                                                            aria-valuenow="29" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <span class="value-text">29%</span>
                                                </div>

                                                <div class="single-progress-bar">
                                                    <div class="rating-text">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 6%"
                                                            aria-valuenow="6" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <span class="value-text">6%</span>
                                                </div>

                                                <div class="single-progress-bar">
                                                    <div class="rating-text">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 1%"
                                                            aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <span class="value-text">1%</span>
                                                </div>

                                                <div class="single-progress-bar">
                                                    <div class="rating-text">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-star"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 1%"
                                                            aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
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
                                    @foreach ($testimonials as $t)
                                        <div class="rbt-course-review about-author">
                                            <div class="media">
                                                <div class="thumbnail">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/about/about-01.jpg') }}"
                                                            alt="Author Images">
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
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <a href="#"><i
                                                                        class="fa fa-star {{ $i < round((float) ($t->review ?? 5)) ? '' : 'text-muted' }}"></i></a>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <p class="description">
                                                            {{ Str::limit($t->description ?? $t->review, 150) }}</p>
                                                        <ul
                                                            class="social-icon social-default transparent-with-border justify-content-start">
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
                        <!-- End Course Details  -->

                        <!-- Start Related Course  -->
                        {{-- <div class="related-course mt--60">
                                <div class="row g-5 align-items-end mb--40">
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <div class="section-title">
                                            <span class="subtitle bg-pink-opacity">Top Course</span>
                                            <h4 class="title">More Course By <strong class="color-primary">{{ optional($course->instructor)->name ?? 'Instructor' }}</strong></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="read-more-btn text-start text-md-end">
                                            <a class="rbt-btn rbt-switch-btn btn-border btn-sm" href="#">
                                                <span data-text="View All Course">View All Course</span>
                                            </a>
                                        <div class="row g-5">
                                            @foreach ($relatedCourses as $rc)
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                                    <div class="rbt-card variation-01 rbt-hover">
                                                        <div class="rbt-card-img">
                                                            <a href="{{ route('courseDetails2', [$rc->slug ?? $rc->id]) }}">
                                                                <img src="{{ $rc->images ? asset($rc->images) : asset('assets/images/course/course-online-01.jpg') }}" alt="Card image - {{ $rc->course_name }}" onerror="this.src='{{ asset('assets/images/course/course-online-01.jpg') }}'">
                                                                @if (!empty($rc->off_price) && !empty($rc->current_price))
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
                                                                        @for ($i = 0; $i < 5; $i++)
                                                                            <i class="fas fa-star {{ $i < round((float)($rc->rating ?? 0)) ? '' : 'text-muted' }}"></i>
                                                                        @endfor
                                                                    </div>
                                                                    <span class="rating-count"> ({{ rand(1,40) }} Reviews)</span>
                                                                </div>
                                                                <div class="rbt-bookmark-btn">
                                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                                                </div>
                                                            </div>

                                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails2', [$rc->slug ?? $rc->id]) }}">{{ $rc->course_name }}</a>
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
                                                                    @if (!empty($rc->off_price))
                                                                        <span class="off-price">${{ $rc->off_price }}</span>
                                                                    @endif
                                                                </div>
                                                                <a class="rbt-btn-link" href="{{ route('courseDetails2', [$rc->slug ?? $rc->id]) }}">Learn
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
                            <!-- End Related Course  -->
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-separator />

    @include('partials.related-courses-section')

    <!-- Start Course Action Bottom  -->
    {{-- <div class="rbt-course-action-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title text-center text-md-start">
                        <h5 class="title mb--0">The Complete Histudy 2024: From Zero to Expert!</h5>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt_sm--15">
                    <div class="course-action-bottom-right rbt-single-group">
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
    </div> --}}
    <!-- End Course Action Bottom  -->

    @include('frontend-partials.footer')

@endsection
