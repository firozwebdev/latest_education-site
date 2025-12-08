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
            <img src="{{ asset('assets/images/bg/bg-image-10.jpg') }}" alt="KMF GLOBAL EDUCATION IMAGE">
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
                        <h2 class="title">DETAILED VISA GUIDANCE TO ENSURE A SMOOTH JOURNEY ABROAD</h2>
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
                                    <h4 class="title">EXPERT VISA SUPPORT FOR A SEAMLESS JOURNEY ABROAD <strong class="color-primary">A SEAMLESS JOURNEY ABROAD</strong></h4>
                                </div>
                                    <p>Securing a student visa is a significant milestone in your study abroad journey. However, the visa application process can often seem overwhelming, with complex documentation and varying requirements for each country. At KMF GLOBAL EDUCATION LTD , we provide you with personalized visa guidance to make the process easier, more efficient, and stress-free. Whether you're heading to the USA, UK, Canada, Australia, or any other study destination, we ensure that you meet all the requirements and help you secure your visa without hassle.

Our expert team guides you at every stage of the visa process, from the initial consultation to post-visa approval, ensuring you are prepared and confident in your journey. We aim to simplify your visa application process and improve your chances of success with our comprehensive services.

Here’s how we can assist you in obtaining your student visa


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
        <h4 class="rbt-title-style-3"> VISA GUIDANCE FOR A SMOOTH INTERNATIONAL JOURNEY</h4>
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
We start by evaluating your academic qualifications, financial situation, and chosen destination’s visa requirements to determine your eligibility for a student visa. This initial assessment helps identify any gaps or challenges early in the process, allowing us to devise a strategic approach to your visa application.
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
We guide you through the entire visa application process, providing detailed instructions on completing forms, gathering documents, and adhering to deadlines. Our team ensures that your application is completed accurately and submitted in a timely manner, minimizing the risk of errors and delays.

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
Embassy interviews are a key part of the visa process, and we help you prepare thoroughly. Our team conducts mock interviews, providing you with sample questions and personalized feedback. This prepares you to answer confidently and accurately, significantly increasing your chances of approval.

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
Our experts will carefully review all required documents for your visa application, including your academic transcripts, financial statements, passport, and other necessary paperwork. We ensure that everything is in order and meets the specific requirements of the visa office to avoid delays or rejection.

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
We keep you informed about the progress of your application every step of the way. From the submission of your application to the decision-making process, we update you on any developments, including any additional documents or actions required by the embassy.
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
                            <a class="hover-flip-item-wrapper" href="#">POST-VISA APPROVAL GUIDANCE</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Once your visa is approved, the next steps can be just as important. We provide guidance on travel arrangements, orientation sessions, and preparing for your departure. Our team ensures that you are ready to leave with all the necessary information and resources to settle into your new country smoothly.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-author-list rbt-shadow-box featured-wrapper mt--30" >
    <div class="section-title">
        <h4 class="rbt-title-style-3">WHY CHOOSE KMF GLOBAL EDUCATION LTD  FOR YOUR VISA GUIDANCE?</h4>
    </div>
    <div class="rbt-featured-review-list-wrapper" id="Choose">
        <div class="rbt-course-review about-author">
            <div class="media">
                {{-- <div class="thumbnail">
                    <a href="#">
                        <img src="{{ asset('assets/images/testimonial/art-text-element-3.png') }}" alt="Author Images">
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
At KMF GLOBAL EDUCATION LTD , we bring years of experience and an in-depth understanding of the visa process across multiple countries. Our consultants are highly knowledgeable about the specific visa requirements for each destination, and we tailor our services to your unique profile. With our high success rate and personal approach, we ensure that your visa application stands out and is as efficient as possible.
.                        </p>
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
                            <a class="hover-flip-item-wrapper" href="#">Comprehensive Understanding</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We stay updated on the latest visa regulations and requirements for each country.
</p>
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
                            <a class="hover-flip-item-wrapper" href="#">Step-by-Step Guidance</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
Our team helps you understand each stage of the process and prepares you thoroughly.
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
                            <a class="hover-flip-item-wrapper" href="#">Efficient Processing</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
We streamline the entire application process, saving you time and avoiding unnecessary complications.
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
                            <a class="hover-flip-item-wrapper" href="#">High Success Rate</a>
                        </h5>
                    </div>
                    <div class="content">
                        <p class="description">
With a proven track record, we have helped countless students successfully secure their student visas.
              </p>
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
                            <a class="hover-flip-item-wrapper" href="#">START YOUR VISA APPLICATION WITH CONFIDENCE</a>
                        </h5>
                          <p class="description">
Let us make your visa journey a smooth and successful one. Our expert consultants are here to guide you through the complex visa process, helping you secure your student visa with ease. With KMF GLOBAL EDUCATION LTD  by your side, you can focus on preparing for your academic journey while we take care of your visa application.

Contact us today to get started on your visa application and embark on the path to studying abroad! </p>

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
