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
                .toast-message { font-size: 16px !important; font-weight: 500 !important; }
                .toastr-large { width: 350px !important; }
            `)
                .appendTo("head");

            // Newsletter AJAX submit
            $('#newsletter-form').on('submit', function(e) {
                e.preventDefault();
                $('.text-danger').html('');
                var submitBtn = $('#newsletter-submit');
                var originalBtnText = submitBtn.find('.btn-text').text();
                submitBtn.find('.btn-text').text('Subscribing...');
                submitBtn.prop('disabled', true);

                $.ajax({
                    url: "{{ route('newsletter.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        // Reset button state
                        submitBtn.find('.btn-text').text(originalBtnText);
                        submitBtn.prop('disabled', false);

                        if (response.success) {
                            toastr.success(response.message, null, {
                                "timeOut": "7000",
                                "extendedTimeOut": "2000"
                            });
                            $('#newsletter-form')[0].reset();
                        } else {
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
                                var errorMessages = [];
                                $.each(response.errors, function(key, value) {
                                    $('[name="' + key + '"]').siblings('.text-danger')
                                        .html(value[0]);
                                    errorMessages.push(value[0]);
                                });

                                if (response.errors['email'] && response.errors['email'][0]
                                    .includes('already been taken')) {
                                    toastr.error(
                                        'This email address is already subscribed to our newsletter.'
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

            // Initialize SAL for SUCCESS STORIES section
            if (typeof sal !== 'undefined') {
                sal({
                    threshold: 0.01,
                    once: true
                });
            }
        });
    </script>
    @endpush
    @php
    $blogs = \App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get();
    $successDeliveries = \App\Models\SuccessDelivery::orderBy('created_at', 'desc')->limit(4)->get();
    $footerUniversities = \App\Models\University::with('country')
    ->orderBy('created_at', 'desc')
    ->paginate(12, ['*'], 'footer_page');
    @endphp
    <!-- Start Succsess Stoy Counter  -->
    <div class="rbt-category-area bg-color-white rbt-section-gapTop" style="padding:30px 0 !important;">
        <div class="container">
            <div class="row g-5">



                <!-- Start Category Box Layout  -->

                <!-- End Category Box Layout  -->






                @php
                $testimonials = \App\Models\Testimonial::orderBy('created_at', 'desc')->get();
                @endphp

                <div class="rbt-testimonial-area bg-color-extra2 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mb--60">
                                <div class="section-title text-center">
                                    <h2 class="title">STUDENT'S FEEDBACK</h2>
                                    <p class="description mt--20">Learning communicate to global world and build a bright
                                        future and
                                        career development, increase your skill with our histudy.</p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-item-3-activation swiper rbt-arrow-between gutter-swiper-30">


                            <div class="rbt-testimonial-area bg-color-white rbt-section-gap overflow-hidden">
                                <div class="container-fluid">
                                    <div class="row g-12 align-items-center">

                                        <div class="col-xl-12">
                                            <div class="overflow-hidden">

                                                <div class="scroll-animation-wrapper pb--50">
                                                    <div class="scroll-animation scroll-left-right">
                                                        @foreach ($testimonials as $testimonial)
                                                        <!-- Start Single Testimonial  -->
                                                        <div class="single-column-20">
                                                            <div class="rbt-testimonial-box">
                                                                <div class="inner">
                                                                    <div class="clint-info-wrapper">
                                                                        <div class="thumb">
                                                                            <img src="{{ $testimonial->image ? asset($testimonial->image) : asset('assets/images/testimonial/client-01.png') }}"
                                                                                alt="{{ $testimonial->name }}">
                                                                        </div>
                                                                        <div class="client-info">
                                                                            <h5 class="title">{{ $testimonial->name }}</h5>
                                                                            <span>{{ $testimonial->designation }}
                                                                                @if ($testimonial->company)
                                                                                <i>@ {{ $testimonial->company }}</i>
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="description">
                                                                        <p class="subtitle-3">{!! $testimonial->review !!}</p>
                                                                        <div class="rating mt--20">
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                            <a href="#"><i
                                                                                    class="fa fa-star{{ $i <= ($testimonial->rating ?? 5) ? '' : '-o' }}"></i></a>
                                                                            @endfor
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Single Testimonial  -->
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                <!-- End Student Feedback Counter  -->

                {{-- <div class="rbt-ready-area ready-section-01 rbt-section-gap rbt-section-box bg_image--29 bg_image">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title text-center">
                                    <span class="subtitle bg-primary-opacity">Ready to start?</span>
                                    <h2 class="title w-600">SELF DEVELOPMENT COURSE</h2>
                                    <p class="mt--10 description">We believe that we have the power to shape the <br>
                                        future, for the better lifelong</p>
                                    <a class="rbt-btn btn-gradient hover-icon-reverse"
                                        href="http://127.0.0.1:8000/take-assessment">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">TAKE ASSESMENT</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Start FAQs Section -->
                <div class="rbt-accordion-area  bg-color-white" style="margin-top:10px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="section-title text-center mb--60">
                                    <span class="subtitle bg-secondary-opacity">HAVE QUESTIONS?</span>
                                    <h2 class="title">Frequently Asked Questions</h2>
                                    <p class="description mt--20">Find answers to the most common questions about our
                                        marketplace and services.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="rbt-accordion-style rbt-accordion-04 accordion">
                                    <div class="accordion" id="accordionMarketplace">
                                        <div class="faq-item">
                                            <div class="faq-question" onclick="toggleFaq(this)">
                                                <span>What is the marketplace and how does it work?</span>
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="faq-answer">
                                                Our marketplace is a comprehensive platform that connects students with educational institutions, courses, and services. You can browse through various programs, compare options, and apply directly through our streamlined process.
                                            </div>
                                        </div>

                                        <div class="faq-item">
                                            <div class="faq-question" onclick="toggleFaq(this)">
                                                <span>How can I apply for courses through the marketplace?</span>
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="faq-answer">
                                                Simply browse our course catalog, select the program that interests you, and click the "Apply Now" button. You'll be guided through a step-by-step application process with all necessary documentation requirements clearly outlined.
                                            </div>
                                        </div>

                                        <div class="faq-item">
                                            <div class="faq-question" onclick="toggleFaq(this)">
                                                <span>What support services do you provide?</span>
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="faq-answer">
                                                We offer comprehensive support including academic counseling, visa assistance, accommodation guidance, and ongoing student support throughout your educational journey. Our expert advisors are available to help you every step of the way.
                                            </div>
                                        </div>

                                        <div class="faq-item">
                                            <div class="faq-question" onclick="toggleFaq(this)">
                                                <span>Are there any fees for using the marketplace?</span>
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="faq-answer">
                                                Browsing and searching through our marketplace is completely free. We only charge service fees for successful applications and additional support services, which are clearly outlined before you proceed with any paid services.
                                            </div>
                                        </div>

                                        <div class="faq-item">
                                            <div class="faq-question" onclick="toggleFaq(this)">
                                                <span>How do I track my application status?</span>
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="faq-answer">
                                                Once you submit an application, you'll receive a unique tracking ID and access to your personal dashboard where you can monitor the progress of all your applications in real-time, receive updates, and communicate with institutions directly.
                                            </div>
                                        </div>

                                        <div class="faq-item">
                                            <div class="faq-question" onclick="toggleFaq(this)">
                                                <span>What if I need help choosing the right program?</span>
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="faq-answer">
                                                Our expert education counselors are here to help! You can schedule a free consultation to discuss your goals, preferences, and requirements. We'll provide personalized recommendations based on your academic background and career aspirations.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End FAQs Section -->
                <style>
                .faq-item {
                    border: 1px solid #e0e0e0;
                    border-radius: 8px;
                    margin-bottom: 10px;
                    overflow: hidden;
                }
                .faq-question {
                    padding: 20px;
                    background: #f8f9fa;
                    cursor: pointer;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    font-weight: 600;
                    transition: background 0.3s;
                }
                .faq-question:hover {
                    background: #e9ecef;
                }
                .faq-answer {
                    padding: 0 20px;
                    max-height: 0;
                    overflow: hidden;
                    transition: all 0.3s ease;
                    background: white;
                }
                .faq-answer.active {
                    padding: 20px;
                    max-height: 200px;
                }
                .faq-question i {
                    transition: transform 0.3s;
                }
                .faq-question.active i {
                    transform: rotate(45deg);
                }
                </style>
                <script>
                function toggleFaq(element) {
                    const answer = element.nextElementSibling;
                    const icon = element.querySelector('i');
                    
                    document.querySelectorAll('.faq-answer').forEach(ans => {
                        if (ans !== answer) {
                            ans.classList.remove('active');
                            ans.previousElementSibling.classList.remove('active');
                        }
                    });
                    
                    answer.classList.toggle('active');
                    element.classList.toggle('active');
                }
                </script>
            </div>

        </div>
    </div>
    <div class="rbt-section-gap bg-color-white">
        <div class="container">
            <style>
                /* SUCCESS STORIES Section */
                .success-stories-section {
                    background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
                    padding: 60px 0;
                }

                .success-stories-title {
                    text-align: center;
                    margin-bottom: 50px;
                }

                .success-stories-title .subtitle {
                    display: inline-block;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    font-size: 13px;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 2px;
                    margin-bottom: 15px;
                    animation: titleFadeIn 0.6s ease forwards;
                }

                .success-stories-title h2 {
                    font-size: 2.5rem;
                    font-weight: 700;
                    color: #1a1a1a;
                    margin-bottom: 15px;
                    line-height: 1.2;
                    animation: titleSlideDown 0.7s ease 0.2s forwards;
                    opacity: 0;
                }

                .success-stories-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                    gap: 24px;
                    margin-top: 40px;
                }

                .success-story-item {
                    position: relative;
                    overflow: hidden;
                    border-radius: 18px;
                    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
                    background: white;
                    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                }

                /* Auto-trigger animation on load with stagger - 4 cards animate together */
                .success-stories-section .success-story-item {
                    animation: cardSlideUp 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
                    opacity: 0;
                }

                /* First batch (1-4) animates immediately */
                .success-story-item:nth-child(1) {
                    animation-delay: 0.2s;
                }

                .success-story-item:nth-child(2) {
                    animation-delay: 0.35s;
                }

                .success-story-item:nth-child(3) {
                    animation-delay: 0.5s;
                }

                .success-story-item:nth-child(4) {
                    animation-delay: 0.65s;
                }

                /* Second batch (5-8) animates after first batch completes */
                .success-story-item:nth-child(5) {
                    animation-delay: 1.3s;
                }

                .success-story-item:nth-child(6) {
                    animation-delay: 1.45s;
                }

                .success-story-item:nth-child(7) {
                    animation-delay: 1.6s;
                }

                .success-story-item:nth-child(8) {
                    animation-delay: 1.75s;
                }

                /* Third batch (9-12) - if needed */
                .success-story-item:nth-child(9) {
                    animation-delay: 2.4s;
                }

                .success-story-item:nth-child(10) {
                    animation-delay: 2.55s;
                }

                .success-story-item:nth-child(11) {
                    animation-delay: 2.7s;
                }

                .success-story-item:nth-child(12) {
                    animation-delay: 2.85s;
                }

                .success-story-item:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 20px 50px rgba(102, 126, 234, 0.15);
                }

                .success-story-thumbnail {
                    position: relative;
                    overflow: hidden;
                    height: 280px;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                }

                .success-story-thumbnail img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    display: block;
                    transition: transform 0.5s ease;
                }

                .success-story-item:hover .success-story-thumbnail img {
                    transform: scale(1.08);
                }

                /* Play button overlay */
                .success-story-overlay {
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: rgba(102, 126, 234, 0.8);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    opacity: 0;
                    transition: opacity 0.4s ease;
                    z-index: 10;
                }

                .success-story-item:hover .success-story-overlay {
                    opacity: 1;
                }

                .play-btn {
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                    background: white;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    box-shadow: 0 10px 35px rgba(0, 0, 0, 0.2);
                    transform: scale(0.8);
                    opacity: 0;
                }

                .success-story-item:hover .play-btn {
                    opacity: 1;
                    animation: playBtnPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
                    transform: scale(1);
                }

                .play-btn:hover {
                    transform: scale(1.15);
                    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.3);
                }

                .play-btn i {
                    color: #667eea;
                    font-size: 28px;
                    margin-left: 3px;
                }

                /* Student name and info */
                .success-story-content {
                    padding: 20px;
                    text-align: center;
                }

                .success-story-name {
                    font-size: 1.1rem;
                    font-weight: 700;
                    color: #1a1a1a;
                    margin: 0 0 8px 0;
                }

                .success-story-info {
                    font-size: 0.9rem;
                    color: #666;
                    margin: 0;
                }

                /* Animations */
                @keyframes titleFadeIn {
                    from {
                        opacity: 0;
                    }

                    to {
                        opacity: 1;
                    }
                }

                @keyframes titleSlideDown {
                    from {
                        opacity: 0;
                        transform: translateY(-20px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                @keyframes cardSlideUp {
                    from {
                        opacity: 0;
                        transform: translateY(40px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                @keyframes playBtnPop {
                    0% {
                        opacity: 0;
                        transform: scale(0);
                    }

                    50% {
                        opacity: 1;
                        transform: scale(1.2);
                    }

                    100% {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                /* Responsive */
                @media (max-width: 1024px) {
                    .success-stories-grid {
                        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    }

                    .success-stories-title h2 {
                        font-size: 2rem;
                    }
                }

                @media (max-width: 768px) {
                    .success-stories-section {
                        padding: 40px 0;
                    }

                    .success-stories-title h2 {
                        font-size: 1.6rem;
                    }

                    .success-stories-grid {
                        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                        gap: 16px;
                    }

                    .success-story-thumbnail {
                        height: 180px;
                    }

                    .play-btn {
                        width: 50px;
                        height: 50px;
                    }

                    .play-btn i {
                        font-size: 18px;
                    }

                    .success-story-content {
                        padding: 15px;
                    }

                    .success-story-name {
                        font-size: 0.95rem;
                    }

                    .success-story-info {
                        font-size: 0.8rem;
                    }
                }
            </style>

            <div class="success-stories-section">
                <div class="success-stories-title">
                    <span class="subtitle">Student Achievements</span>
                    <h2 class="title">Success Stories From Our Students</h2>
                    <p class="description mt--20">Hear directly from our successful students about their transformative journeys</p>
                </div>

                <div class="success-stories-slider swiper">
                    <style>
                        .success-stories-area {
                            background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
                        }

                        .success-stories-slider {
                            padding: 40px 20px;
                        }

                        .success-story-card {
                            background: white;
                            border-radius: 15px;
                            padding: 30px;
                            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                            min-height: 350px;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            transition: all 0.3s ease;
                            opacity: 0;
                            animation: slideInCard 0.6s ease forwards;
                        }

                        .success-story-card:hover {
                            transform: translateY(-8px);
                            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
                        }

                        @keyframes slideInCard {
                            from {
                                opacity: 0;
                                transform: translateX(50px);
                            }

                            to {
                                opacity: 1;
                                transform: translateX(0);
                            }
                        }

                        .success-story-header {
                            display: flex;
                            align-items: center;
                            gap: 15px;
                            margin-bottom: 20px;
                        }

                        .story-avatar {
                            width: 60px;
                            height: 60px;
                            border-radius: 50%;
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-weight: 600;
                            font-size: 24px;
                        }

                        .story-info h4 {
                            margin: 0;
                            font-size: 16px;
                            font-weight: 600;
                            color: #1a1a1a;
                        }

                        .story-info p {
                            margin: 5px 0 0 0;
                            font-size: 13px;
                            color: #666;
                        }

                        .story-content {
                            flex: 1;
                            margin-bottom: 15px;
                        }

                        .story-content p {
                            font-size: 15px;
                            line-height: 1.6;
                            color: #555;
                            margin: 0;
                        }

                        .story-rating {
                            display: flex;
                            gap: 5px;
                            margin-bottom: 15px;
                        }

                        .star {
                            color: #ffc107;
                            font-size: 16px;
                        }

                        .story-destination {
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            color: white;
                            padding: 8px 15px;
                            border-radius: 20px;
                            display: inline-block;
                            font-size: 12px;
                            font-weight: 600;
                        }

                        .swiper-pagination {
                            margin-top: 30px;
                        }

                        .swiper-pagination-bullet {
                            background: #667eea;
                            opacity: 0.5;
                        }

                        .swiper-pagination-bullet-active {
                            background: #667eea;
                            opacity: 1;
                        }

                        .swiper-button-next,
                        .swiper-button-prev {
                            color: #667eea;
                            background: rgba(102, 126, 234, 0.1);
                            padding: 15px;
                            border-radius: 50%;
                            width: 50px;
                            height: 50px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }

                        .swiper-button-next:after,
                        .swiper-button-prev:after {
                            font-size: 20px;
                        }

                        /* Video Play Overlay */
                        .video-play-overlay {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            width: 60px;
                            height: 60px;
                            background: rgba(102, 126, 234, 0.9);
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            opacity: 0;
                            transition: all 0.3s ease;
                            z-index: 10;
                        }

                        .success-story-card:hover .video-play-overlay {
                            opacity: 1;
                            transform: translate(-50%, -50%) scale(1.1);
                        }

                        .video-play-overlay i {
                            color: white;
                            font-size: 20px;
                            margin-left: 3px;
                        }

                        @media (max-width: 768px) {
                            .success-story-card {
                                min-height: auto;
                                padding: 20px;
                            }

                            .swiper-button-next,
                            .swiper-button-prev {
                                display: none;
                            }

                            .video-play-overlay {
                                width: 50px;
                                height: 50px;
                            }

                            .video-play-overlay i {
                                font-size: 16px;
                            }
                        }
                    </style>

                    <div class="swiper-wrapper">
                        @forelse ($successDeliveries as $delivery)
                            <div class="swiper-slide">
                                <div class="success-story-card" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-url="{{ $delivery->youtube_link	 ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}" style="cursor: pointer;">
                                    <div>
                                        <div class="success-story-header">
                                            @if ($delivery->image)
                                                <div class="story-avatar" style="background-image: url('{{ asset('storage/'.$delivery->image) }}'); background-size: cover; background-position: center; background-color: #667eea;"></div>
                                            @else
                                                <div class="story-avatar" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">{{ strtoupper(substr($delivery->name,0,2)) }}</div>
                                            @endif
                                            <div class="story-info">
                                                <h4>{{ $delivery->name }}</h4>
                                                <p>{{ $delivery->country ?? 'Global' }} · {{ $delivery->course ?? 'Student' }}</p>
                                            </div>
                                        </div>

                                        <div class="story-rating">
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                            <span class="star">★</span>
                                        </div>

                                        <div class="story-content">
                                            <p>{{ 
                                                Str::limit($delivery->message ?? ($delivery->description ?? 'No story available.'), 260)
                                            }}</p>
                                        </div>
                                    </div>
                                    <span class="story-destination">{{ $delivery->university_name ?? 'Alumni' }}</span>
                                    <div class="video-play-overlay">
                                        <i class="fas fa-play"></i>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <div class="success-story-card">
                                    <div class="story-content">
                                        <p class="text-muted">No success stories available at the moment.</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <!-- Video Modal -->
                <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="background: #1a1a2e; border: none; border-radius: 15px;">
                            <div class="modal-header" style="border-bottom: 1px solid rgba(255,255,255,0.1); padding: 20px;">
                                <h5 class="modal-title" id="videoModalLabel" style="color: #fff; font-weight: 600;">Student Success Story</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
                            </div>
                            <div class="modal-body" style="padding: 0;">
                                <div class="video-container" style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; border-radius: 0 0 15px 15px; overflow: hidden;">
                                    <iframe id="videoFrame" width="100%" height="100%" style="position: absolute; top: 0; left: 0;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Initialize Swiper
                        new Swiper('.success-stories-slider', {
                            slidesPerView: 1,
                            spaceBetween: 30,
                            pagination: {
                                el: '.success-stories-slider .swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.success-stories-slider .swiper-button-next',
                                prevEl: '.success-stories-slider .swiper-button-prev',
                            },
                            breakpoints: {
                                768: {
                                    slidesPerView: 2,
                                },
                                1024: {
                                    slidesPerView: 3,
                                },
                            },
                            autoplay: {
                                delay: 5000,
                                disableOnInteraction: false,
                            },
                            loop: true,
                        });

                        // Handle video modal
                        const videoModal = document.getElementById('videoModal');
                        const videoFrame = document.getElementById('videoFrame');
                        
                        // When modal is shown, load the video
                        videoModal.addEventListener('show.bs.modal', function (event) {
                            const button = event.relatedTarget;
                            const videoUrl = button.getAttribute('data-video-url');
                            
                            // Convert YouTube URL to embed format if needed
                            let embedUrl = videoUrl;
                            if (videoUrl && videoUrl.includes('youtube.com/watch')) {
                                const videoId = videoUrl.split('v=')[1]?.split('&')[0];
                                embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                            } else if (videoUrl && videoUrl.includes('youtu.be/')) {
                                const videoId = videoUrl.split('youtu.be/')[1]?.split('?')[0];
                                embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                            } else if (videoUrl && !videoUrl.includes('embed')) {
                                embedUrl = videoUrl + '?autoplay=1';
                            }
                            
                            videoFrame.src = embedUrl;
                        });
                        
                        // When modal is hidden, stop the video
                        videoModal.addEventListener('hide.bs.modal', function () {
                            videoFrame.src = '';
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <!-- Start Faqs -->
    {{-- <div class="rbt-accordion-area accordion-style-1 bg-color-extra2 rbt-section-gap">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 order-2 order-lg-1 mt_md--40 mt_sm--40">
                    <div class="rbt-accordion-style accordion">
                        <div class="section-title text-start">
                            <span class="subtitle bg-pink-opacity">FAQs</span>
                            <h2 class="title">QUESTION WITH FAQS
                            <p class="description has-medium-font-size mt--20 mb--40" align="left">KMF Global Education Ltd transforms students’ dreams to study abroad. It specializes in providing guidance to the students to find the right universities and the right courses KMF Global Education Ltd empowers the students to unlock their potential and achieve their academic excellence. </p>

                        </div>

                        <div class="rbt-accordion-style rbt-accordion-05 accordion">
                            <div class="accordion" id="accordionExampleb4">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingFour1">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour1" aria-expanded="true" aria-controls="collapseFour1">
                                            Am I eligible to study abroad?
                                        </button>

                                    <div id="collapseFour1" class="accordion-collapse collapse" aria-labelledby="headingFour1" data-bs-parent="#accordionExampleb4" style="">
                                        <div class="accordion-body card-body">
                                           If you want to take your degree from abroad, you must meet a range of entry requirements from international universities. For example, Academic requirements Language requirements Sponsorship & so on. Our expert counsellors are ready to help you 24/7.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingFour2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour2" aria-expanded="false" aria-controls="collapseFour2">
                                           Without IELTS can I apply for study abroad?
                                        </button>

                                    <div id="collapseFour2" class="accordion-collapse collapse" aria-labelledby="headingFour2" data-bs-parent="#accordionExampleb4">
                                        <div class="accordion-body card-body">
                                           We encourage you to take your IELTS first then apply for study abroad. You may think IELTS is not necessary for study abroad. But, remember “IELTS is not your cost, it’s an investment” However, you can apply without IELTS & our counsellors are here to support you.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingFour3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour3" aria-expanded="false" aria-controls="collapseFour3">
                                            What should I consider when choosing what and where to study?
                                        </button>
                                    </h2>
                                    <div id="collapseFour3" class="accordion-collapse collapse" aria-labelledby="headingFour3" data-bs-parent="#accordionExampleb4">
                                        <div class="accordion-body card-body">
                                            When you think what and where to study, start by thinking about your lifestyle, academic and career goals. You may consider the following things: Courses & subjects. Internships & job placement. University ranking. University location. Migration policies. Overall, your lifestyle. When you think what and where to study, our counsellors will able to provide guidance on the courses & subjects, internships, universities location and migration policies that suits you.


                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingFour4">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour4" aria-expanded="false" aria-controls="collapseFour4">
                                            How much will it cost to study internationally?
                                        </button>
                                    </h2>
                                    <div id="collapseFour4" class="accordion-collapse collapse" aria-labelledby="headingFour4" data-bs-parent="#accordionExampleb4">
                                        <div class="accordion-body card-body">
                                            Believe it or not, it is indeed possible to study abroad on a budge! Meanwhile, international universities offer a range of scholarships for international students. Education Hub counsellor team ready to find scholarships for you.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="thumbnail rbt-image-gallery-1 mb--80 text-end">
                        <img class="image-1 rbt-radius" data-parallax="{&quot;x&quot;: 0, &quot;y&quot;: 30}" src="{{ asset('assets/images/about/about-03.jpg') }}" alt="Education Images" style="transform:translate3d(0px, 17.74px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, 17.74px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); ">
                        <img class="image-2 rbt-radius" data-parallax="{&quot;x&quot;: 0, &quot;y&quot;: 80}" src="{{ asset('assets/images/about/about-11.jpg') }}" alt="Education Images" style="transform:translate3d(0px, 24.173px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, 24.173px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); ">
                    </div>
                </div>
            </div>
        </div>
</div> --}}
    </div>
    </div>
    <!-- Close Faqs -->


    <div class="rbt-section-gap">
        <!-- Start Blog Style -->
        <div class="rbt-rbt-blog-area rbt-section-gapTop bg-gradient-8 rbt-round-bottom-shape">
            <div class="wrapper pb--50 rbt-index-upper">
                <div class="container">
                    <div class="row g-5 align-items-end mb--60">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="section-title text-start">
                                <h2 class="title color-white">Latest News</h2>
                                <p class="description color-white-off mt--20">Learning communicate to global world and
                                    build a bright future and career development, increase your skill with our histudy.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="load-more-btn text-start text-lg-end">
                                <a class="rbt-btn btn-border icon-hover radius-round color-white-off"
                                    href="{{ route('blog') }}">
                                    {{-- <span class="btn-text">See All Articles</span> --}}
                                    {{-- <span class="btn-icon"><i class="feather-arrow-right"></i></span> --}}
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Start Card Area -->
                    <div class="row row--15">
                        @if ($blogs->count() > 0)
                            <!-- Start Single Card  -->
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30 sal-animate" data-sal-delay="150"
                                data-sal="slide-up" data-sal-duration="800">
                                <div class="rbt-card height-330 variation-02 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ route('blog') }}">
                                            <img src="{{ $blogs[0]->featured_image ? asset('storage/' . $blogs[0]->featured_image) : asset('assets/images/blog/blog-card-01.jpg') }}"
                                                alt="Blog image">
                                            <div class="rbt-default-badge">
                                                <span>{{ $blogs[0]->category ?? 'Blog' }}</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h4 class="rbt-card-title"><a
                                                href="{{ route('blog') }}">{{ Str::limit($blogs[0]->title, 50) }}</a>
                                        </h4>
                                        <p class="rbt-card-text">
                                            {{ Str::limit($blogs[0]->description ?? 'No description available.', 100) }}
                                        </p>
                                        <div class="rbt-card-bottom">
                                            <a class="transparent-button" href="{{ route('blog') }}">Learn
                                                More<i><svg width="17" height="12"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                            <path d="M10.614 0l5.629 5.629-5.63 5.629"></path>
                                                            <path stroke-linecap="square" d="M.663 5.572h14.594"></path>
                                                        </g>
                                                    </svg></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Card  -->

                            @if ($blogs->count() > 1)
                                @foreach ($blogs->skip(1) as $blog)
                                @endforeach
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30 sal-animate" data-sal-delay="150"
                                    data-sal="slide-up" data-sal-duration="800">
                                    @foreach ($blogs->skip(1) as $index => $blog)
                                        <!-- Start Single Card  -->
                                        <div
                                            class="rbt-card card-list variation-02 rbt-hover {{ $index > 0 ? 'mt--30' : '' }}">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('blog') }}">
                                                    <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('assets/images/blog/blog-card-0' . ($index + 2) . '.jpg') }}"
                                                        alt="Blog image"> </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <h4 class="rbt-card-title"><a
                                                        href="{{ route('blog') }}">{{ Str::limit($blog->title, 25) }}</a>
                                                    <div class="rbt-card-bottom">
                                                        <a class="transparent-button" href="{{ route('blog') }}">Learn
                                                            More<i><svg width="17" height="12"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g stroke="#27374D" fill="none"
                                                                        fill-rule="evenodd">
                                                                        <path d="M10.614 0l5.629 5.629-5.63 5.629"></path>
                                                                        <path stroke-linecap="square"
                                                                            d="M.663 5.572h14.594"></path>
                                                                    </g>
                                                                </svg></i></a>
                                                    </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- End Card Area -->
            </div>
        </div>
    </div>
    </div>
    <!-- End Blog Style -->

    <!-- Start Newsletter Area  -->

    <div class="rbt-newsletter-area newsletter-style-2 bg-color-primary rbt-section-gap">
        <div class="container">
            <div class="row row--15 align-items-center" style="padding-top:20px;">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <div class="section-title text-center">
                            
                            <h2 class="title color-white"><strong>SUBSCRIBE TO OUR NEWSLETTER</h2>
                        </div>
                        <form id="footer-newsletter-form" class="newsletter-form-1 mt--40">
                            @csrf
                            <input type="email" name="email" placeholder="Enter Your E-Email" required>
                            <button type="submit" id="footer-newsletter-submit"
                                class="rbt-btn btn-md btn-gradient hover-icon-reverse">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Subscribe</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </button>
                        </form>
                        <span class="note-text color-white mt--20">No ads, No trails, No commitments</span>

                        <div class="row row--15 mt--50">
                            <!-- Start Single Counter -->
                            <div class="col-lg-3 offset-lg-3 col-md-6 col-sm-6 single-counter">
                                <div class="rbt-counterup rbt-hover-03 style-2 text-color-white">
                                    <div class="inner">
                                        <div class="content">
                                            <h3 class="counter color-white"><span class="odometer"
                                                    data-count="850">00</span>
                                            </h3>
                                            <h5 class="title color-white">ALL COURSES</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Counter -->

                            <!-- Start Single Counter -->
                            <div class="col-lg-3 col-md-6 col-sm-6 single-counter mt_mobile--30">
                                <div class="rbt-counterup rbt-hover-03 style-2 text-color-white">
                                    <div class="inner">
                                        <div class="content">
                                            <h3 class="counter color-white"><span class="odometer"
                                                    data-count="90">00</span>
                                            </h3>
                                            <h5 class="title color-white">SUCSESSFUL RATIO</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Counter -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Newsletter Area  -->

    <div class="mt--40">
        <div class="rbt-brand-title-wrap">
            <h5 class="rbt-brand-title w-600 text-center mb-0">Partner <span class="theme-gradient">Universities <span
                        class="theme-gradient">
        </div>
        <style>
            /* Partner universities marquee animations */
            .brand-marquee-wrap {
                overflow: hidden;
            }

            .brand-marquee {
                width: 100%;
                overflow: hidden;
                margin-top: 30px;
            }


            .brand-marquee__inner {
                display: flex;
                align-items: center;
                gap: 36px;
                /* make inner track twice the container width for a seamless loop */
                width: 200%;
                box-sizing: content-box;
                animation: scroll-left 20s linear infinite;
            }

            .brand-marquee--reverse .brand-marquee__inner {
                animation: scroll-right 22s linear infinite;
            }

            .brand-marquee__item {
                flex: 0 0 auto;
            }

            .brand-marquee__item img {
                height: 56px;
                width: auto;
                object-fit: contain;
                filter: grayscale(40%);
                opacity: .95;
                transition: transform .25s ease, filter .25s ease, opacity .25s ease;
                display: block;
            }

            .brand-marquee__item img:hover {
                transform: scale(1.05);
                filter: grayscale(0%);
                opacity: 1;
            }

            @keyframes scroll-left {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }

            @keyframes scroll-right {
                0% {
                    transform: translateX(-50%);
                }

                100% {
                    transform: translateX(0);
                }
            }

            /* responsive tweaks */
            @media (max-width: 768px) {
                .brand-marquee__inner {
                    gap: 18px;
                }

                .brand-marquee__item img {
                    height: 44px;
                }
            }
        </style>

        <div class="container brand-marquee-wrap">
            <!-- left to right animation (implemented by moving inner left, visually items move left) -->
            <div class="brand-marquee" aria-hidden="false">
                <div class="brand-marquee__inner">
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>

                    <!-- duplicate for smooth loop -->
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>

                </div>
            </div>

            <!-- right to left animation (reverse direction) -->
            <div class="brand-marquee brand-marquee--reverse" aria-hidden="false">
                <div class="brand-marquee__inner">
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>

                    <!-- duplicate for smooth loop -->
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-07.png') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-06.jpeg') }}" alt="Brand Image"></a></div>
                    <div class="brand-marquee__item"><a href="#"><img
                                src="{{ asset('assets/images/brand/brand-08.png') }}" alt="Brand Image"></a></div>
                </div>
            </div>
        </div></br>
    </div>


    <div class="rbt-callto-action rbt-cta-default style-4 bg-gradient-6 mt--75 rbt-section-gap">
        <div class="container">
            <div class="row align-items-center content-wrapper row--30 mt_dec--30 position-relative" style="top:100px !important">
                <div class="col-lg-8 mt--30 offset-lg-3">
                    <div class="inner">
                        <div class="content text-left">
                            <h2 class="title sal-animate" data-sal="slide-up">DISCOVER, APPLY, SUCCEED – STUDY ABROAD
                                WITH KMF</h2>
                            <div class="call-to-btn text-start mt--30">
                                <a class="rbt-btn btn-gradient hover-icon-reverse"
                                    href="{{ route('book-appointment') }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">BOOK APPOINTMENT </span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="thumbnail">
                    <img class="w-100" src="{{ asset('assets/images/shape/cta.png') }}" alt="Shape Images">
                </div>
            </div>
        </div>
    </div>

    <!-- start award section -->
    <section class="award-section-custom py-5 section-bg position-relative">
        <div class="container">
            <div class="text-center mb-5" style="margin-top:80px;">
                <h2 class="section-title">Our Awards &amp; Achievements</h2>
                <p class="text-muted">Recognitions that showcase our commitment to excellence.</p>
            </div>

            <div class="award-grid">
                <article class="award-card">
                    <a href="https://kmfglobaleducation.com/" target="_blank" class="award-inner" rel="noopener">
                        <div class="award-ring">
                            <img src="https://educationhub-bd.com/assets/front/img/partners/6726087f49c54.png"
                                alt="award" class="award-logo img-fluid" />
                        </div>
                        <div class="award-meta">
                            <h4>Top Partner</h4>
                            <span class="award-badge">2024</span>
                        </div>
                    </a>
                </article>

                {{-- <article class="award-card">
                    <a href="https://educationhub-bd.com/" target="_blank" class="award-inner" rel="noopener">
                        <div class="award-ring">
                            <img src="https://educationhub-bd.com/assets/front/img/partners/6726088b50e5f.png" alt="award"
                                class="award-logo img-fluid" />
                        </div>
                        <div class="award-meta">
                            <h4>Innovation Award</h4>
                            <span class="award-badge">2023</span>
                        </div>
                    </a>
                </article> --}}

                <article class="award-card">
                    <a href="https://kmfglobaleducation.com/" target="_blank" class="award-inner" rel="noopener">
                        <div class="award-ring">
                            <img src="https://educationhub-bd.com/assets/front/img/partners/67260898890bc.png"
                                alt="award" class="award-logo img-fluid" />
                        </div>
                        <div class="award-meta">
                            <h4>Excellence In Service</h4>
                            <span class="award-badge">2022</span>
                        </div>
                    </a>
                </article>

                {{-- <article class="award-card">
                    <a href="https://educationhub-bd.com/" target="_blank" class="award-inner" rel="noopener">
                        <div class="award-ring">
                            <img src="https://educationhub-bd.com/assets/front/img/partners/672608a6c1172.png" alt="award"
                                class="award-logo img-fluid" />
                        </div>
                        <div class="award-meta">
                            <h4>Community Choice</h4>
                            <span class="award-badge">2021</span>
                        </div>
                    </a>
                </article> --}}
            </div>
        </div>

        <style>
            .award-section-custom .section-title {
                font-weight: 700;
            }

            .award-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1.25rem;
                align-items: stretch;
            }

            .award-card {
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.04), rgba(255, 255, 255, 0.02));
                border-radius: 14px;
                padding: 20px;
                text-align: center;
                transition: transform .35s ease, box-shadow .35s ease;
                box-shadow: 0 6px 18px rgba(16, 24, 40, 0.06);
            }

            .award-card .award-inner {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-decoration: none;
                color: inherit;
            }

            .award-ring {
                width: 110px;
                height: 110px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: radial-gradient(circle at 30% 30%, rgba(212, 165, 116, 0.18), rgba(0, 0, 0, 0));
                box-shadow: 0 6px 18px rgba(212, 165, 116, 0.08) inset;
                margin-bottom: 12px;
                position: relative;
            }

            .award-ring::after {
                content: "";
                position: absolute;
                inset: -6px;
                border-radius: 50%;
                background: conic-gradient(from 0deg, rgba(212, 165, 116, 0.18), transparent 30%);
                filter: blur(6px);
                opacity: .85;
                transition: opacity .25s ease;
            }

            .award-logo {
                max-width: 70%;
                max-height: 70%;
                display: block;
            }

            .award-meta h4 {
                margin: 6px 0 0;
                font-size: 16px;
                font-weight: 600;
            }

            .award-badge {
                display: inline-block;
                margin-top: 6px;
                background: #d4a574;
                color: #fff;
                padding: 4px 8px;
                border-radius: 999px;
                font-size: 12px;
            }

            .award-card:hover {
                transform: translateY(-8px) scale(1.02);
                box-shadow: 0 12px 36px rgba(16, 24, 40, 0.12);
            }

            .award-card:hover .award-ring::after {
                opacity: 1;
                transform: rotate(8deg);
            }

            @media (max-width: 1024px) {
                .award-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 576px) {
                .award-grid {
                    grid-template-columns: 1fr;
                }

                .award-ring {
                    width: 90px;
                    height: 90px;
                }
            }
        </style>
    </section>
    <!-- end award section -->

    <x-separator />
    <!-- Start Footer aera -->

    {{-- <x-footer2/> --}}
    <!-- End Footer aera -->

    <!-- start old footer -->
    {{-- <footer class="rbt-footer footer-style-1">
        <div class="footer-top">
            <div class="container">
                <div class="row row--15 mt_dec--30">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">

                            <div class="logo logo-dark">
                                <a href="#">
                                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Edu-cause">
                                </a>
                            </div>

                            <div class="logo d-none logo-light">
                                <a href="#">
                                    <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Edu-cause">
                                </a>
                            </div>


                            <p class="description mt--20" align="justify">KMF Global Education Ltd transforms students
                                dream to study abroad. It is specialized in providing the guidance to the students to find
                                the right universities and the right courses. KMF Global Education ltd empowers the students
                                to unlock their potentials and achieve their academic excellence.
                            </p>

                            <div class="contact-btn mt--30">
                                <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round"
                                    href="{{ route('contact') }}">
                                    <div class="icon-reverse-wrapper">
                                        <span class="btn-text">Contact With Us</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Useful Links</h5>
                            <ul class="ft-link">
                                <li><span></li>
                                <li><span>BD Office:</span> Dhanmondi Tower, House 4/1 3rd Floor, Road 27, Dhanmondi,
                                    Dhaka.</br> Phone:</span> <a href="#">+880 167 1135988</a></br> E-mail:</span>
                                    <a href="mailto:info@kmfglobaleducation.com">info@kmfglobaleducation.com</a>
                                </li>
                            </ul>

                            <ul class="ft-link">
                                <li><span></li>
                                <li><span>UK Office:</span> Suite 4, 44 Circus Road, London, NW8 9JH</br> Phone: </span> <a
                                        href="#">+44 7956040045</a></br><a href="#">Phone: <span>+44
                                            7885636441</a></br> E-mail:</span> <a
                                        href="mailto:info@kmfglobaleducation.com">info@kmfglobaleducation.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Our Company</h5>
                            <ul class="ft-link">
                                <li><span></li>
                                <li><span>BD Office:</span> Dhanmondi Tower, House 4/1 3rd Floor, Road 27, Dhanmondi,
                                    Dhaka.</br> Phone:</span> <a href="#">+880 167 1135988</a></br> E-mail:</span>
                                    <a href="mailto:info@kmfglobaleducation.com">info@kmfglobaleducation.com</a>
                                </li>
                            </ul>

                            <ul class="ft-link">
                                <li><span></li>
                                <li><span>UK Office:</span> Suite 4, 44 Circus Road, London, NW8 9JH</br> Phone: </span> <a
                                        href="#">+44 7956040045</a></br><a href="#">Phone: <span>+44
                                            7885636441</a></br> E-mail:</span> <a
                                        href="mailto:info@kmfglobaleducation.com">info@kmfglobaleducation.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h5 class="ft-title">Get Contact</h5>
                            <ul class="ft-link">
                                <li><span></li>
                                <li><span>BD Office:</span> Dhanmondi Tower, House 4/1 3rd Floor, Road 27, Dhanmondi,
                                    Dhaka.</br> Phone:</span> <a href="#">+880 167 1135988</a></br> E-mail:</span>
                                    <a href="mailto:info@kmfglobaleducation.com">info@kmfglobaleducation.com</a>
                                </li>
                            </ul>

                            <ul class="ft-link">
                                <li><span></li>
                                <li><span>UK Office:</span> Suite 4, 44 Circus Road, London, NW8 9JH</br> Phone: </span> <a
                                        href="#">+44 7956040045</a></br><a href="#">Phone: <span>+44
                                            7885636441</a></br> E-mail:</span> <a
                                        href="mailto:info@kmfglobaleducation.com">info@kmfglobaleducation.com</a></li>
                            </ul>
                            <ul class="social-icon social-default icon-naked justify-content-start mt--20">
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
        </div>
    </footer> --}}
    <!-- end old footer -->

    <!-- start new footer -->
    <footer class="footer-modern">
        <style>
            .footer-modern {
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
                color: #fff;
                position: relative;
                overflow: hidden;
            }

            .footer-modern::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle at center, rgba(212, 165, 116, 0.08), transparent);
                border-radius: 50%;
                pointer-events: none;
            }

            .footer-modern::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 400px;
                height: 400px;
                background: radial-gradient(circle at center, rgba(102, 126, 234, 0.06), transparent);
                border-radius: 50%;
                pointer-events: none;
            }

            .footer-area-three {
                position: relative;
                z-index: 1;
            }

            .footer-top-three {
                padding: 60px 0 40px !important;
            }

            /* Company Info Section */
            .footer-company-section {
                background: rgba(255, 255, 255, 0.04);
                border-radius: 18px;
                padding: 40px;
                margin-bottom: 60px;
                border: 1px solid rgba(212, 165, 116, 0.12);
                backdrop-filter: blur(10px);
                transition: all 0.3s ease;
            }

            .footer-company-section:hover {
                background: rgba(255, 255, 255, 0.06);
                border-color: rgba(212, 165, 116, 0.25);
                transform: translateY(-4px);
            }

            .company-logo {
                max-width: 150px;
                margin-bottom: 20px;
                display: inline-block;
            }

            .company-logo img {
                max-height: 60px;
                width: auto;
                object-fit: contain;
                filter: brightness(1.1);
            }

            .company-description {
                font-size: 15px;
                line-height: 1.7;
                color: rgba(255, 255, 255, 0.75);
                margin: 20px 0;
                max-width: 400px;
            }

            /* Section Headers */
            .footer-section-header {
                text-align: center;
                margin-bottom: 50px;
                animation: fadeInDown 0.6s ease forwards;
            }

            .footer-section-header p {
                color: rgba(212, 165, 116, 0.9);
                font-size: 14px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 2px;
                margin-bottom: 10px;
            }

            .footer-section-header h2 {
                font-size: 2.2rem;
                font-weight: 700;
                color: #fff;
                margin-bottom: 20px;
            }

            .footer-section-header .divider {
                width: 120px;
                height: 3px;
                background: linear-gradient(90deg, transparent, #d4a574, transparent);
                margin: 0 auto;
            }

            /* Branch/Office Cards */
            .footer-widget.widget-one {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(212, 165, 116, 0.12);
                border-radius: 14px;
                padding: 24px;
                height: 100%;
                transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                backdrop-filter: blur(8px);
            }

            .footer-widget.widget-one:hover {
                background: rgba(255, 255, 255, 0.08);
                border-color: rgba(212, 165, 116, 0.3);
                transform: translateY(-6px);
                box-shadow: 0 12px 40px rgba(102, 126, 234, 0.1);
            }

            .widget-title {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 18px;
                position: relative;
                padding-bottom: 10px;
                color: #ffffff !important;
            }

            .widget-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 40px;
                height: 2px;
                background: linear-gradient(90deg, #d4a574, transparent);
            }

            .widget-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .widget-list li {
                transition: all 0.3s ease;
                padding-left: 0;
            }

            .widget-list li:hover {
                padding-left: 8px;
                color: rgba(212, 165, 116, 0.95) !important;
            }

            .footer-icon {
                color: #d4a574;
                min-width: 18px;
                display: inline-flex;
                align-items: center;
            }

            /* Social Links */
            .footer-bottom-img {
                position: relative;
                margin-top: 60px;
                padding-top: 40px;
                border-top: 1px solid rgba(212, 165, 116, 0.15);
            }

            .custom-positioned.social-links {
                gap: 16px !important;
                margin-bottom: 30px;
            }

            .social-link {
                width: 44px;
                height: 44px;
                border-radius: 50%;
                background: rgba(212, 165, 116, 0.12);
                display: inline-flex;
                align-items: center;
                justify-content: center;
                color: #d4a574;
                font-size: 16px;
                transition: all 0.3s ease;
                border: 1px solid rgba(212, 165, 116, 0.2);
            }

            .social-link:hover {
                background: #d4a574;
                color: #1a1a2e;
                transform: translateY(-4px);
                box-shadow: 0 8px 20px rgba(212, 165, 116, 0.25);
            }

            /* Footer Bottom Image */
            .footer-bottom-img img {
                display: block;
                margin-top: 20px;
                border-radius: 12px;
                opacity: 0.95;
            }

            /* Contact Button */
            .contact-btn {
                margin-top: 20px;
            }

            .contact-btn .rbt-btn {
                color: #d4a574;
                border-color: rgba(212, 165, 116, 0.4);
                padding: 12px 24px;
                font-size: 14px;
                font-weight: 600;
                display: inline-block;
                transition: all 0.3s ease;
            }

            .contact-btn .rbt-btn:hover {
                background: rgba(212, 165, 116, 0.12);
                border-color: #d4a574;
                color: #d4a574;
            }

            /* Responsive */
            @media (max-width: 1024px) {
                .footer-section-header h2 {
                    font-size: 1.8rem;
                }

                .footer-company-section {
                    padding: 30px;
                    margin-bottom: 40px;
                }
            }

            @media (max-width: 768px) {
                .footer-top-three {
                    padding: 40px 0 30px !important;
                }

                .footer-section-header h2 {
                    font-size: 1.4rem;
                }

                .footer-company-section {
                    padding: 24px;
                    text-align: center;
                }

                .company-description {
                    margin: 15px auto;
                }

                .footer-widget.widget-one {
                    padding: 20px;
                }

                .custom-positioned.social-links {
                    justify-content: center !important;
                    margin-top: 30px;
                }

                .footer-bottom-img {
                    margin-top: 40px;
                }
            }

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>

        <div class="footer-area-three">
            <div class="footer-top-three py-5">
                <div class="container">
                    <!-- Company Info Section -->
                    {{-- <div class="footer-company-section">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="company-logo">
                                    <a href="/">
                                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="KMF Global Education">
                                    </a>
                                </div>
                                <p class="company-description">
                                    KMF Global Education Ltd transforms students' dreams to study abroad. We specialize in
                                    providing expert guidance to help students find the right universities and courses. We
                                    empower students to unlock their potential and achieve academic excellence.
                                </p>
                                <div class="contact-btn">
                                    <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round"
                                        href="{{ route('contact') }}">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Contact With Us</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Branches & Offices Section -->
                    <div class="footer-section-header">
                        <p>Global Presence</p>
                        <h2>Find Us At Your Doorstep</h2>
                        <div class="divider"></div>
                    </div>

                    <div class="row mt-5">
                        <!-- London Office -->
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-widget widget-one">
                                <h4 class="widget-title">London Office</h4>
                                <ul class="widget-list">
                                    <li class="text-white fs-14 mb-2 d-flex justify-content-start align-items-start gap-1">
                                        <i class="fa fa-map-marker-alt me-2 footer-icon"></i>
                                        Suite 4, 44 Circus Road, London, NW8 9JH
                                    </li>
                                    <li class="text-white fs-14 mb-2 d-flex justify-content-start align-items-start gap-1">
                                        <i class="fa fa-phone me-2 footer-icon"></i>
                                        +44 7956040045
                                    </li>
                                    <li class="text-white fs-14 mb-2 d-flex justify-content-start align-items-start gap-1">
                                        <i class="fa fa-phone me-2 footer-icon"></i>
                                        +44 7885636441
                                    </li>
                                    <li class="text-white fs-14 mb-2 d-flex justify-content-start align-items-start gap-1">
                                        <i class="fa fa-envelope me-2 footer-icon"></i>
                                        info@kmfglobaleducation.com
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Dhaka Office -->
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-widget widget-one">
                                <h4 class="widget-title">Dhaka Office</h4>
                                <ul class="widget-list">
                                    <li class="text-white fs-14 mb-2 d-flex justify-content-start align-items-start gap-1">
                                        <i class="fa fa-map-marker-alt me-2 footer-icon"></i>
                                        Dhanmondi Tower, House 4/1 3rd Floor, Road 27, Dhanmondi, Dhaka
                                    </li>
                                    <li class="text-white fs-14 mb-2 d-flex justify-content-start align-items-start gap-1">
                                        <i class="fa fa-phone me-2 footer-icon"></i>
                                        +880 167 1135988
                                    </li>
                                    <li class="text-white fs-14 mb-2 d-flex justify-content-start align-items-start gap-1">
                                        <i class="fa fa-envelope me-2 footer-icon"></i>
                                        info@kmfglobaleducation.com
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Social Links & Footer Image -->
                        <div class="footer-bottom-img position-relative">
                            <div class="custom-positioned social-links d-flex justify-content-end align-items-center">
                                <a href="#" target="_blank" class="social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" target="_blank" class="social-link">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" target="_blank"
                                    class="social-link">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" target="_blank" class="social-link">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" target="_blank" class="social-link">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                            <img  src="https://educationhub-bd.com/gerow/img/footer-below.png" width="100%"
                                height="100%" class="img-fluid w-100" alt="" style="border-radius: 12px;display:none;">
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!-- end new footer -->

    <x-separator />
    <!-- Start Footer aera -->

    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright © 2025 <a
                            href="https://www.widedevsolution.com/">Wide Dev Solution</a> All Rights Reserved</p>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <ul
                        class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                        <li><a href="{{ route('terms-of-service') }}">Terms of service</a></li>
                        <li><a href="{{ route('privacy-policy') }}">Privacy policy</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
