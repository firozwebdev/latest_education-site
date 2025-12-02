@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
@endphp

@section('content')
    @include('frontend-partials.header')

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

                $('#contact-form').on('submit', function(e) {
                    e.preventDefault();

                    // Clear previous error messages
                    $('.text-danger').html('');

                    // Show loading state
                    var submitBtn = $('#submit');
                    var originalBtnText = submitBtn.find('.btn-text').text();
                    submitBtn.find('.btn-text').text('Sending...');
                    submitBtn.prop('disabled', true);

                    $.ajax({
                        url: "{{ route('contact.store') }}",
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
                                $('#contact-form')[0].reset();
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
                                        $('[name="' + key + '"]').siblings('.text-danger')
                                            .html(value[0]);
                                        errorMessages.push(value[0]);
                                    });

                                    // Show specific error message for email uniqueness if present
                                    if (response.errors['contact-phone'] && response.errors[
                                            'contact-phone'][0].includes('already been taken')) {
                                        toastr.error(
                                            'This email address is already registered in our system.'
                                            );
                                    } else {
                                        toastr.error('Please check the form for errors: ' +
                                            errorMessages[0]);
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

    <!-- Start Side Vav -->
    <x-sideVav />
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start breadcrumb Area -->
    <!-- Start Faqs -->
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="rbt-accordion-style accordion">
                    <div class="section-title text-start mb--60">
                        <h4 class="title">Frequestly Asked Questions</h4>
                    </div>
                    <div class="rbt-accordion-style rbt-accordion-04 accordion">
                        <div class="accordion" id="accordionExamplec3">
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree1" aria-expanded="false"
                                        aria-controls="collapseThree1">
                                        What is Histudy ? How does it work?
                                    </button>
                                </h2>
                                <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1"
                                    data-bs-parent="#accordionExamplec3" style="">
                                    <div class="accordion-body card-body">
                                        You can run Histudy easily. Any School, University, College can be use this histudy
                                        education template for their educational purpose. A university can be run their
                                        online leaning management system by histudy education template.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree2" aria-expanded="false"
                                        aria-controls="collapseThree2">
                                        How can I get the customer support?
                                    </button>
                                </h2>
                                <div id="collapseThree2" class="accordion-collapse collapse" aria-labelledby="headingThree2"
                                    data-bs-parent="#accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        After purchasing the product need you any support you can be share with
                                        us with sending mail to pixcelsthemes@gmail.com.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree3" aria-expanded="false"
                                        aria-controls="collapseThree3">
                                        Can I get update regularly and For how long do I get updates?
                                    </button>
                                </h2>
                                <div id="collapseThree3" class="accordion-collapse collapse" aria-labelledby="headingThree3"
                                    data-bs-parent="#accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        Yes, We will get update the Histudy. And you can get it any time. Next
                                        time we will comes with more feature. You can be get update for
                                        unlimited times. Our dedicated team works for update.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="headingThree4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree4" aria-expanded="false"
                                        aria-controls="collapseThree4">
                                        15 Things To Know About Education?
                                    </button>
                                </h2>
                                <div id="collapseThree4" class="accordion-collapse collapse" aria-labelledby="headingThree4"
                                    data-bs-parent="#accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        If you're looking for random paragraphs, you've come to the right place. When a
                                        random word or a random sentence isn't quite enough, the next logical step is to
                                        find a random paragraph.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="rbt-accordion-style accordion">
                    <div class="section-title text-start mb--60">
                        <h4 class="title">&nbsp;</h4>
                    </div>
                    <div class="rbt-accordion-style rbt-accordion-04 accordion">
                        <div class="accordion" id="faqs-accordionExamplec3">
                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqs-collapseThree1" aria-expanded="true"
                                        aria-controls="faqs-collapseThree1">
                                        What is Histudy ? How does it work?
                                    </button>
                                </h2>

                                <div id="faqs-collapseThree1" class="accordion-collapse collapse show"
                                    aria-labelledby="faqs-headingThree1" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        You can run Histudy easily. Any School, University, College can be use this histudy
                                        education template for their educational purpose. A university can be run their
                                        online leaning management system by histudy education template.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqs-collapseThree2" aria-expanded="false"
                                        aria-controls="faqs-collapseThree2">
                                        7 Facts About Education That Will Blow
                                    </button>
                                </h2>
                                <div id="faqs-collapseThree2" class="accordion-collapse collapse"
                                    aria-labelledby="faqs-headingThree2" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        After purchasing the product need you any support you can be share with
                                        us with sending mail to pixcelsthemes@gmail.com.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqs-collapseThree3" aria-expanded="false"
                                        aria-controls="faqs-collapseThree3">
                                        10 Brilliant Ways To Advertise Education
                                    </button>
                                </h2>
                                <div id="faqs-collapseThree3" class="accordion-collapse collapse"
                                    aria-labelledby="faqs-headingThree3" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        Yes, We will get update the Histudy. And you can get it any time. Next
                                        time we will comes with more feature. You can be get update for
                                        unlimited times. Our dedicated team works for update.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header card-header" id="faqs-headingThree4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqs-collapseThree4" aria-expanded="false"
                                        aria-controls="faqs-collapseThree4">
                                        15 Common Myths About Education
                                    </button>
                                </h2>
                                <div id="faqs-collapseThree4" class="accordion-collapse collapse"
                                    aria-labelledby="faqs-headingThree4" data-bs-parent="#faqs-accordionExamplec3">
                                    <div class="accordion-body card-body">
                                        If you're looking for random paragraphs, you've come to the right place. When a
                                        random word or a random sentence isn't quite enough, the next logical step is to
                                        find a random paragraph.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Close Faqs -->
    </br>
    <!-- End Accordion Area  -->

    <x-separator />

    <!-- Start Contact Area  -->
    <div class="rbt-contact-address rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img class="w-100 radius-6" src="{{ asset('assets/images/about/contact.jpg') }}"
                            alt="Contact Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">EDUCATION FOR EVERYONE</span>
                        </div>
                        <h3 class="title">Get a Free Course You Can Contact With Me</h3>
                        <form id="contact-form" class="rainbow-dynamic-form max-width-auto">
                            @csrf
                            <div class="form-group">
                                <input name="contact-name" id="contact-name" type="text"
                                    value="{{ old('contact-name') }}">
                                <label>Name</label>
                                <span class="focus-border"></span>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <input name="contact-email" id="contact-email" type="email"
                                    value="{{ old('contact-email') }}">
                                <label>Email</label>
                                <span class="focus-border"></span>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
                                <label>Your Subject</label>
                                <span class="focus-border"></span>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <textarea name="contact-message" id="contact-message">{{ old('contact-message') }}</textarea>
                                <label>Message</label>
                                <span class="focus-border"></span>
                                <div class="text-danger"></div>
                            </div>
                            <div class="form-submit-group">
                                <button name="submit" type="submit" id="submit"
                                    class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">GET IT NOW</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area  -->

    <x-separator />
    @include('frontend-partials.footer')
@endsection
