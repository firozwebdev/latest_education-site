@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
@endphp

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize toastr options
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "fontSize": "16px",
            "toastClass": "toastr-large"
        };

        // Add custom CSS for larger toastr messages
        $("<style>")
            .prop("type", "text/css")
            .html(`
                .toast-message {
                    font-size: 16px !important;
                    font-weight: 500 !important;
                }
                .toastr-large {
                    width: 350px !important;
                }
            `)
            .appendTo("head");

        $('#appointment-form').on('submit', function(e) {
            e.preventDefault();

            // Clear previous error messages
            $('.text-danger').html('');

            // Show loading state
            var submitBtn = $('#submit-appointment');
            var originalBtnText = submitBtn.find('.btn-text').text();
            submitBtn.find('.btn-text').text('Sending...');
            submitBtn.prop('disabled', true);

            $.ajax({
                url: "{{ route('book-appointment.store') }}",
                type: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    // Reset button state
                    submitBtn.find('.btn-text').text(originalBtnText);
                    submitBtn.prop('disabled', false);

                    if (response.success) {
                        // Show success message with larger text
                        toastr.success(response.message, null, {
                            "timeOut": "7000",
                            "extendedTimeOut": "2000"
                        });

                        // Reset form
                        $('#appointment-form')[0].reset();
                    } else {
                        // Show error message
                        toastr.error(response.message);
                    }
                },
                error: function(xhr) {
                    // Reset button state
                    submitBtn.find('.btn-text').text(originalBtnText);
                    submitBtn.prop('disabled', false);

                    if (xhr.status === 422) {
                        var response = xhr.responseJSON;
                        if (response && response.errors) {
                            // Display validation errors
                            var errorMessages = [];
                            $.each(response.errors, function(key, value) {
                                $('[name="' + key + '"]').siblings('.text-danger').html(value[0]);
                                errorMessages.push(value[0]);
                            });

                            // Show specific error message for email uniqueness if present
                            if (response.errors['con_username'] && response.errors['con_username'][0].includes('already been taken')) {
                                toastr.error('This email address is already registered in our system.');
                            } else {
                                toastr.error('Please check the form for errors: ' + errorMessages[0]);
                            }
                        } else {
                            toastr.error('Validation failed. Please check your inputs.');
                        }
                    } else {
                        toastr.error('An error occurred. Please try again later.');
                    }
                }
            });
        });
    });
</script>
@endpush

@section('content')

    @include('frontend-partials.header')
    <!-- Start Side Vav -->

    <x-sideVav/>
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">BOOK FREE APPOINTMENT</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="#">HOME</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">BOOK APPOINTMENT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-become-area bg-color-white rbt-section-gap">
        <div class="container">


            <div class="row pt--60 g-5">
                <div class="col-lg-4">
                    <div class="thumbnail">
                        <img class="radius-10 w-100" src="{{ asset('assets/images/tab/tabs-10.jpg') }}" alt="Corporate Template">
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">BOOK APPOINTMENT</span>
                        </div>
                        <h3 class="title">BOOK FREE APPOINTMENT</h3>
                        <hr class="mb--30">

                        <form id="appointment-form" class="row row--15">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="con_name" type="text" value="{{ old('con_name') }}">
                                    <label>First Name</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="con_lastname" type="text" value="{{ old('con_lastname') }}">
                                    <label>Last Name</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="con_username" type="email" value="{{ old('con_username') }}">
                                    <label>Email Address</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="con_phone" type="text" value="{{ old('con_phone') }}">
                                    <label>Phone Number</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6" style="display: none;">
                                <div class="form-group">
                                    <select name="option" value="{{ old('option') }}">
                                        <option value="Albania">Albania</option>
                                    </select>
                                    <label>Select Country</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="appointment_date" type="date" value="{{ old('appointment_date') }}">
                                    <label>Appointment Date</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="appointment_time" type="time" value="{{ old('appointment_time') }}">
                                    <label>Appointment Time</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="message">{{ old('message') }}</textarea>
                                    <label>Message</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-submit-group">
                                    <button type="submit" id="submit-appointment" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">SEND YOUR INFORMATION</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="thumb-wrapper bg-color-white rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper rbt-gif-banner-area rbt-arrow-between">
                        <div class="swiper-wrapper">
                            <!-- Start Single Banner  -->
                            <div class="swiper-slide">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="rbt-radius w-100" src="{{ asset('assets/images/banner/gallery-banner-01.jpg') }}" alt="Banner Images">
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Banner  -->
                            <!-- Start Single Banner  -->
                            <div class="swiper-slide">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="rbt-radius w-100" src="{{ asset('assets/images/banner/gallery-banner-02.jpg') }}" alt="Banner Images">
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Banner  -->
                            <!-- Start Single Banner  -->
                            <div class="swiper-slide">
                                <div class="thumbnail">
                                    <a href="#">
                                        <img class="rbt-radius w-100" src="{{ asset('assets/images/banner/gallery-banner-03.jpg') }}" alt="Banner Images">
                                    </a>
                                </div>
                            </div>
                            <!-- End Single Banner  -->
                        </div>

                        <div class="rbt-swiper-arrow rbt-arrow-left">
                            <div class="custom-overfolow">
                                <i class="rbt-icon feather-arrow-left"></i>
                                <i class="rbt-icon-top feather-arrow-left"></i>
                            </div>
                        </div>

                        <div class="rbt-swiper-arrow rbt-arrow-right">
                            <div class="custom-overfolow">
                                <i class="rbt-icon feather-arrow-right"></i>
                                <i class="rbt-icon-top feather-arrow-right"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

                    <div class="rbt-counterup-area bg_image bg_image_fixed bg_image--20 ptb--170 bg-black-overlay" data-black-overlay="2">
        <div class="conter-style-2">
            <div class="container">
                <div class="row g-5">
                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="500">00</span>
                                    </h3>
                                    <span class="subtitle">Learners &amp; counting</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="800">00</span>
                                    </h3>
                                    <span class="subtitle">Courses & Video</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="1000">00</span>
                                    </h3>
                                    <span class="subtitle">Certified Students</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                        <div class="rbt-counterup style-2">
                            <div class="inner">
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="100">00</span>
                                    </h3>
                                    <span class="subtitle">Certified Students</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->
                </div>
            </div>
        </div>
    </div>


    <div class="rbt-testimonial-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb--60">
                    <div class="section-title text-center">
                        <h2 class="title">Student's Feedback</h2>
                        <p class="description mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our histudy.</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-item-3-activation swiper rbt-arrow-between gutter-swiper-30 swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                <div class="swiper-wrapper" id="swiper-wrapper-106685d10adf510e2b6" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                        <!-- Start Single Testimonial  -->
                    <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5" style="width: 430px;">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="https://via.placeholder.com/640x480.png/0011ee?text=velit" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Dr. Austyn Weber</h5>
                                            <span>Student <i>@ Company</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Adipisci unde officiis autem autem. Optio repellendus incidunt quod ut aliquam. Rerum dignissimos modi adipisci nemo iure sapiente labore.</p>
                                        <div class="rating mt--20">
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                                        <!-- Start Single Testimonial  -->
                    <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5" style="width: 430px;">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="https://via.placeholder.com/640x480.png/0011aa?text=aspernatur" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Evie Heller</h5>
                                            <span>Student <i>@ Company</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Voluptas voluptatem itaque quisquam sed possimus perspiciatis qui. Consequatur sit hic nesciunt quod voluptas sint. Aut vero repudiandae quas praesent...</p>
                                        <div class="rating mt--20">
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                                        <!-- Start Single Testimonial  -->
                    <div class="swiper-slide" role="group" aria-label="3 / 5" style="width: 430px;">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="https://via.placeholder.com/640x480.png/0011dd?text=libero" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Dr. Alexander Toy IV</h5>
                                            <span>Student <i>@ Company</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Nam optio perspiciatis fuga aut rem natus maiores aut. Est aut a enim inventore quia iste. Vel sed quia aut veritatis. Ea commodi doloremque eligendi...</p>
                                        <div class="rating mt--20">
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                                        <!-- Start Single Testimonial  -->
                    <div class="swiper-slide" role="group" aria-label="4 / 5" style="width: 430px;">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="https://via.placeholder.com/640x480.png/002266?text=quae" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Francesco Jenkins</h5>
                                            <span>Student <i>@ Company</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Alias maxime eos quo ratione est culpa nulla. Nulla veniam incidunt voluptatem. Ratione necessitatibus accusantium veritatis praesentium corrupti. Qui...</p>
                                        <div class="rating mt--20">
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                                        <!-- Start Single Testimonial  -->
                    <div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 430px;">
                        <div class="single-slide">
                            <div class="rbt-testimonial-box">
                                <div class="inner bg-no-shadow bg-color-primary-opacity">
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="https://via.placeholder.com/640x480.png/00ff66?text=doloribus" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Mr. Ethel Krajcik</h5>
                                            <span>Student <i>@ Company</i></span>
                                        </div>
                                    </div>
                                    <div class="description">
                                        <p class="subtitle-3">Aut vel laborum quod repudiandae nam possimus. Quod at nostrum voluptatibus velit modi sapiente nesciunt. Dolor et quibusdam quibusdam.</p>
                                        <div class="rating mt--20">
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                            <a href="#"><i class="fa fa-star text-muted"></i></a>
                                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                                    </div>

                <div class="rbt-swiper-arrow rbt-arrow-left swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-106685d10adf510e2b6" aria-disabled="true">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-left"></i>
                        <i class="rbt-icon-top feather-arrow-left"></i>
                    </div>
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-right" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-106685d10adf510e2b6" aria-disabled="false">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-right"></i>
                        <i class="rbt-icon-top feather-arrow-right"></i>
                    </div>
                </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </div>

                <div class="mt--80">
                    <div class="rbt-brand-title-wrap">
                        <h5 class="rbt-brand-title w-600 text-center mb-0">Partner  <span class="theme-gradient">Universities <span class="theme-gradient">
                    </span></span></h5></div>
                    <ul class="brand-list brand-style-3 justify-content-start justify-content-lg-between mt--30">
                        <li><a href="#"><img src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></li>
                        <li><a href="#"><img src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></li>

                    </ul></br></br>
                </div>



    <x-separator/>
    @include('frontend-partials.footer')
@endsection
