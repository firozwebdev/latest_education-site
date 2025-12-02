@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
     $bodyClass='';
@endphp

@section('content')

    @include('frontend-partials.header')

    <!-- Start Side Vav -->
    <x-sideVav/>
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
        <div class="breadcrumb-inner breadcrumb-dark">
            <img src="{{ asset('assets/images/bg/bg-image-10.jpg') }}" alt="Education Images">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start">
                        {{-- <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Web Development</li>
                        </ul> --}}
                        <h2 class="title">MAKE STUDYING ABROAD AFFORDABLE WITH SCHOLARSHIPS</h2>
                        {{-- <p class="description">Master Python by building 100 projects in 100 days. Learn data
                            science, automation, build websites, games and apps!</p> --}}

                        <div class="d-flex align-items-center mb--20 flex-wrap rbt-course-details-feature">

                            <div class="feature-sin best-seller-badge">
                                <span class="rbt-badge-2">
                                    <span class="image"><img src="{{ asset('assets/images/icons/card-icon-1.png') }}"
                                            alt="Best Seller Icon"></span> BESTSUPPORT
                                </span>
                            </div>

                            <div class="feature-sin rating">
                                <a href="#">4.5</a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>

                            <div class="feature-sin total-rating">
                                <a class="rbt-badge-4" href="#">215,475 rating</a>
                            </div>

                            <div class="feature-sin total-student">
                                <span>616 students</span>
                            </div>

                        </div>


                        {{-- <ul class="rbt-meta">
                            <li><i class="feather-calendar"></i>Last updated 10/2025</li>
                            <li><i class="feather-globe"></i>English</li>
                        </ul> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="course-details-content">
                        {{-- <div class="rbt-course-feature-box rbt-shadow-box thuumbnail">
                            <img class="w-100" src="{{ asset('assets/images/course/course-01.jpg') }}" alt="Card image">
                        </div> --}}
                            <div class="section-title">
                                    <h4 class="title">WANT TO STUDY ABROAD? SCHOLARSHIPS CAN MAKE IT AFFORDABLE! <strong class="color-primary">CAN MAKE IT AFFORDABLE!</strong></h4>
                                </div>
                                    <p>Studying abroad can be an expensive venture, but it doesn’t have to break the bank. With the right scholarships, you can significantly reduce the financial burden of tuition fees, living expenses, and other associated costs. At EducationHub, we guide you to the best scholarship opportunities available, helping you achieve your academic dreams without financial stress.
We provide detailed guidance on applying for scholarships, including university-specific scholarships, agency awards, and merit-based grants. Here's how we assist you in securing scholarships to make your study abroad journey affordable:
                                    </p>


                        <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu">
                                    <li class="current">
                                        <a href="#Admission">SCHOLARSHIPS </a>
                                    </li>
                                    <li>
                                        <a href="#Submission">AGENCY</a>
                                    </li>
                                    <li>
                                        <a href="#Letter">MERIT</a>
                                    </li>
                                    <li>
                                        <a href="#intructor">GOV </a>
                                    </li>
                                    <li>
                                        <a href="#SOP">PRIVATE</a>
                                    </li>
                                    <li>
                                        <a href="#review">REVIEW</a>
                                    </li>
                                </ul>

                            </nav>
                        </div>

<div class="about-author-list rbt-shadow-box featured-wrapper mt--30" id="Admission">
    <div class="section-title">
        <h4 class="rbt-title-style-3"> SCHOLARSHIPS PROCESSING</h4>
    </div>
    <div class="rbt-featured-review-list-wrapper">
        <div class="rbt-course-review about-author">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/icon-02.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">UNIVERSITY SCHOLARSHIPS</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Many universities offer significant scholarships to international students, often ranging from partial to full coverage of tuition fees. By applying through EducationHub, you automatically qualify for these exclusive university scholarships. Depending on the university and the course, you could receive between 3,000 GBP and up to 50% off your total tuition fees.
                       </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Submission">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/studying.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">AGENCY-SPECIFIC SCHOLARSHIPS</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
As an authorized partner, KMF GLOBAL EDUCATION LTD offers exclusive scholarships for students who apply through us. These scholarships are available for selected universities and programs, offering additional financial support to help you meet your educational goals.

                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Letter">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/airdrop.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">MERIT-BASED SCHOLARSHIPS</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
In addition to university-specific scholarships, we help our students secure merit-based scholarships from various institutions and private organizations. These awards are typically based on academic performance, leadership qualities, or other distinguished achievements.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/backpack.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">GOVERNMENT SCHOLARSHIPS</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Several countries offer government-funded scholarships for international students. These scholarships can cover a wide range of expenses, from tuition fees to living allowances. We help you find the best government scholarship options available and guide you through the application process.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author"id="SOP">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/art-text-element-3.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">PRIVATE AND NGO SCHOLARSHIPS</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
In addition to university and government scholarships, numerous private foundations and NGOs offer financial assistance to students studying abroad. We assist in identifying and applying for these opportunities to help you secure extra funding.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-author-list rbt-shadow-box featured-wrapper mt--30" >
    <div class="section-title">
        <h4 class="rbt-title-style-3">HOW WE HELP YOU SECURE SCHOLARSHIPS</h4>
    </div>
    <div class="rbt-featured-review-list-wrapper" id="Choose">
        <div class="rbt-course-review about-author">
            <div class="media">
                {{-- <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/art-text-element-3.png" alt="Author Images">
                    </a>
                </div> --}}
                <div class="media-body">
                    {{-- <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Expert Guidance</a>
                        </h5>
                    </div> --}}
                    <div class="content">
                        <p class="description">
At EducationHub, our team provides personalized scholarship guidance based on your academic background, financial needs, and career goals. Here’s how we assist:

.                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Submission">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/service-04.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Scholarship Research</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We perform in-depth research to find the best scholarship opportunities available for your chosen destination, university, and course.                     </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Letter">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/service-05.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Application Assistance</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Our experts help you compile all the necessary documents, from academic records to recommendation letters, to ensure your application stands out.                       </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/world.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Personal Statement and Essay Guidance</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We provide assistance in writing impactful personal statements and scholarship essays that highlight your strengths and achievements.                       </p>
                    </div>
                </div>
            </div>
        </div>

                <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/world.png" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Timely Updates</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Our team keeps you informed about upcoming deadlines, so you never miss a chance to apply for a scholarship.                       </p>
                    </div>
                </div>
            </div>
        </div>

                        <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                {{-- <div class="thumbnail">
                    <a href="#">
                        <img src="http://localhost:8000/assets/images/testimonial/world.png" alt="Author Images">
                    </a>
                </div> --}}
                <div class="media-body">

                    <div class="content">
                        <p class="description">
Our team keeps you informed about upcoming deadlines, so you never miss a chance to apply for a scholarship.                       </p>
                        </br><div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">START YOUR SCHOLARSHIP SEARCH TODAY</a>
                        </h5>
                          <p class="description">
Our team keeps you informed about upcoming deadlines, so you never miss a chance to apply for a scholarship.                       </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




                        <!-- Start Course Feature Box  -->

                        <!-- End Course Feature Box  -->

                        <!-- Start Course Content  -->

                        <!-- End Course Content  -->


                        <!-- Start Edu Review List  -->
                        <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                            <div class="course-content">
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
                                            <span class="sub-title">Course Rating</span>
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

                    </div>

                </div>

                               <div class="col-lg-4">
                    <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                        <div class="inner">
                                <div class="add-to-card-button mt--15">
                                    <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="{{ route('services.admission') }}">
                                        <span class="btn-text">ADMISSION</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                                    <div class="add-to-card-button mt--15">
                                    <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="{{ route('services.scholarship') }}">
                                        <span class="btn-text">SCHOLARSHIPS</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                                    <div class="add-to-card-button mt--15">
                                    <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="{{ route('services.visa-guidance') }}">
                                        <span class="btn-text">VISA GUIDANCE </span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                                <div class="add-to-card-button mt--15">
                                    <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="{{ route('services.departure-guidance') }}">
                                        <span class="btn-text">DEPARTURE GUIDANCE </span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                                <div class="add-to-card-button mt--15">
                                    <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="{{ route('services.ielts-registration') }}">
                                        <span class="btn-text">IELTS REGISTRATION </span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                                <div class="add-to-card-button mt--15">
                                    <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="{{ route('services.career-counsel') }}">
                                        <span class="btn-text">CAREER COUNSELING </span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                            <div class="content-item-content">
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
                                        <p>For details about the course</p>
                                        <p class="rbt-badge-2 mt--10 justify-content-center w-100"><i
                                                class="feather-phone mr--5"></i> Call Us: <a href="#"><strong>+880 167 1135988
</strong></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-separator/>
    @include('partials.course-section')
    <x-separator/>
    @include('frontend-partials.footer')

@endsection
