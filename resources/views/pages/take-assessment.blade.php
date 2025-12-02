@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
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

            $('#assessment-form').on('submit', function(e) {
                e.preventDefault();

                // Clear previous error messages
                $('.text-danger').html('');

                // Show loading state
                var submitBtn = $('#submit-assessment');
                var originalBtnText = submitBtn.find('.btn-text').text();
                submitBtn.find('.btn-text').text('Sending...');
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: "{{ route('take-assessment.store') }}",
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
                            $('#assessment-form')[0].reset();
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
                                if (response.errors['con_username'] && response.errors[
                                        'con_username'][0].includes('already been taken')) {
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

@section('content')
    @include('frontend-partials.header')
    <!-- Start Side Vav -->

    <x-sideVav />
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">TAKE ASSESMENT</h2>
                        {{-- <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="#">HOME</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">TAKE ASSESMENT</li>
                        </ul> --}}
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
                        <img class="radius-10 w-100" src="{{ asset('assets/images/tab/tabs-10.jpg') }}"
                            alt="Corporate Template">
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        {{-- <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">TAKE ASSESMENT</span>
                        </div> --}}
                        <h3 class="title">TAKE ASSESMENT</h3>
                        <hr class="mb--30">

                        <form id="assessment-form" class="row row--15">
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
                                    <input name="assessment_date" type="date" value="{{ old('assessment_date') }}">
                                    <label>Assessment Date</label>
                                    <span class="focus-border"></span>
                                    <div class="text-danger"></div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="assessment_time" type="time" value="{{ old('assessment_time') }}">
                                    <label>Assessment Time</label>
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
                                    <button type="submit" id="submit-assessment"
                                        class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Send Your Information</span>
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





    <x-separator />
    @include('frontend-partials.footer')
@endsection
