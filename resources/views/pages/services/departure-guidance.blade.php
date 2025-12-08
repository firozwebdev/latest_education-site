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
                        <h2 class="title">DETAILED VISA SUPPORT FOR A TROUBLE-FREE JOURNEY ABROAD</h2>
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
                                    <h4 class="title">VISA ASSISTANCE FOR  <strong class="color-primary">A SMOOTH TRAVEL EXPERIENCE</strong></h4>
                                </div>
                                    <p align="justify">Securing a student visa is one of the most crucial steps in your journey to studying abroad. At KMF GLOBAL EDUCATION LTD , we provide comprehensive visa guidance to ensure that your application process is smooth, efficient, and stress-free. From the initial assessment to post-arrival support, we’re with you every step of the way.

Our expert team helps you understand the specific visa requirements of your chosen destination, prepares you for interviews, and ensures that all the necessary documents are in place for a successful application.

Here’s how we can assist you in obtaining your student visa</p>


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
        <h4 class="rbt-title-style-3"> VISA SUPPORT FOR A SEAMLESS JOURNEY ABROAD</h4>
    </div>
    <div class="rbt-featured-review-list-wrapper">
        <div class="rbt-course-review about-author">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/icon-02.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">VISA ASSESSMENT & ELIGIBILITY CHECK</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We evaluate your profile, including your academic background, financial documents, and country-specific requirements to assess your eligibility for a student visa. This initial step helps to ensure your chances of success.

                       </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Submission">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/studying.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">VISA APPLICATION ASSISTANCE</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Our team provides step-by-step guidance through the visa application process, helping you complete all necessary forms and ensuring that your application is error-free and submitted on time.


                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Letter">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/airdrop.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">EMBASSY INTERVIEW PREPARATION</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We prepare you for the embassy interview with mock sessions and provide tips on answering questions confidently. We ensure you’re fully prepared for any questions the visa officer may ask.


                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/backpack.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">DOCUMENT REVIEW & VERIFICATION</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We thoroughly review your visa documents, including your passport, academic transcripts, financial statements, and other required paperwork, ensuring that everything meets the visa application standards.


                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author"id="SOP">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/art-text-element-3.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">VISA PROCESSING UPDATES</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We keep you updated throughout the visa processing stages. From the submission to the approval stage, we ensure that you're informed of any changes or additional requirements.

                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="about-author-list rbt-shadow-box featured-wrapper mt--30" >

    <div class="rbt-featured-review-list-wrapper" id="Choose">
        <div class="rbt-course-review about-author">
            <div class="media">
                {{-- <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/art-text-element-3.png') }}" alt="Author Images">
                    </a>
                </div> --}}
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">WHY CHOOSE KMF GLOBAL EDUCATION LTD  FOR YOUR VISA GUIDANCE?</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
KMF GLOBAL EDUCATION LTD  has helped thousands of students successfully secure their study visas. Our team of experienced consultants understands the intricacies of the visa process and is dedicated to providing you with personalized support. With our guidance, you’ll feel confident and prepared throughout your entire visa journey.                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Submission">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/service-04.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Expert Knowledge</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We stay up-to-date with the latest visa regulations and policies.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author" id="Letter">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/service-05.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Personalized Services</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Our services are tailored to your individual needs, ensuring the best possible outcome for your application.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/world.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">High Success Rate</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Our proven track record ensures that you have the highest chance of getting your visa approved. </p>
                    </div>
                </div>
            </div>
        </div>



                        <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                {{-- <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/world.png') }}" alt="Author Images">
                    </a>
                </div> --}}
                <div class="media-body">

                    <div class="content">
                        {{-- <p class="description">
Our team keeps you informed about upcoming deadlines, so you never miss a chance to apply for a scholarship.                       </p> --}}
                        </br><div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">VISA SUCCESS STORIES</a>
                        </h5>
                          <p class="description">
Our students’ success stories speak volumes about our visa guidance expertise. From successful student visa approvals to smooth embassy interviews, we’ve been a key part of many students’ journeys to studying abroad. Here’s how our services have made a difference
 </p>



                <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/world.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Fast Processing</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Our proactive approach has helped students get their visas approved faster than expected.
              </p>
                    </div>
                </div>
            </div>
        </div>

                <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/world.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Customized Support</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Every student receives personalized guidance based on their unique needs and visa requirements.
              </p>
                    </div>
                </div>
            </div>
        </div>

                <div class="rbt-course-review about-author"id="interview">
            <div class="media">
                <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/world.png') }}" alt="Author Images">
                    </a>
                </div>
                <div class="media-body">
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">Overcoming Obstacles</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We’ve assisted students in overcoming complex visa situations, including rejections and document issues.
              </p>
                    </div>
                </div>

            </div>
                        <h5 class="title">
                        <a class="hover-flip-item-wrapper" href="#">OUR VISA GUIDANCE SERVICES INCLUDE</a>
                        </h5>
                        <p class="description">
                        We provide all the necessary tools and support to ensure that your visa application is handled smoothly. Our services are designed to cover every aspect of the process:
                        </p>
                                    <div class="col-lg-6">
                                        <ul class="rbt-list-style-1">
                                            <li><i class="feather-check"></i>Eligibility Check & Assessment</li>
                                            <li><i class="feather-check"></i>Visa Documentation Review</li>
                                            <li><i class="feather-check"></i>Step-by-Step Application Assistance</li>
                                            <li><i class="feather-check"></i>Embassy Interview Preparation</li>
                                             <li><i class="feather-check"></i>Timely Updates on Visa Processing</li>
                                        </ul>
                                    </div>

                                        <div class="media-body"></br>
                    <div class="author-info">
                        <h5 class="title">
                            <a class="hover-flip-item-wrapper" href="#">START YOUR VISA APPLICATION WITH CONFIDENCE</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Let us take the stress out of your visa application process. Our experts will guide you every step of the way, from ensuring that your documentation is correct to preparing you for your embassy interview. Start your application with confidence and focus on your future education abroad.

Get in touch with KMF GLOBAL EDUCATION LTD  today and take the first step towards obtaining your student visa!              </p>
                    </div>
                </div>


        </div>
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
