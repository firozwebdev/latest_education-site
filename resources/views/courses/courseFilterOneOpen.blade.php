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
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Start Breadcrumb Area  -->
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">All Courses</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->
                            <div class=" title-wrapper">
                                <h1 class="title mb--0">All Courses</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div> {{ $courses->total() }} Courses
                                </a>
                            </div>
                            <p class="description">Courses that help beginner designers become true unicorns. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->

            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40 mt_sm--20">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        {{-- <li class="course-switch-item"><button class="rbt-grid-view active" title="Grid Layout"><i class="feather-grid"></i> <span class="text">Grid</span></button></li>
                                        <li class="course-switch-item"><button class="rbt-list-view" title="List Layout"><i class="feather-list"></i> <span class="text">List</span></button></li> --}}
                                    </ul>
                                </div>
                                <div class="rbt-short-item">
                                    <span class="course-index">Showing {{ $courses->firstItem() ?? 0 }}-{{ $courses->lastItem() ?? 0 }} of {{ $courses->total() }} results</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form action="{{ route('courseFilterOneOpen') }}" method="GET" class="rbt-search-style me-0">
                                        <input type="hidden" name="subject" value="{{ request('subject') }}">
                                        <input type="hidden" name="study_level" value="{{ request('study_level') }}">
                                        <input type="hidden" name="country" value="{{ request('country') }}">
                                        <input type="hidden" name="university" value="{{ request('university') }}">
                                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search courses, universities, subjects...">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Filter Toggle  -->
                    <form action="{{ route('courseFilterOneOpen') }}" method="GET" id="filter-form">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <input type="hidden" name="subject" value="{{ request('subject') }}">
                        <input type="hidden" name="study_level" value="{{ request('study_level') }}">
                        <input type="hidden" name="country" value="{{ request('country') }}">
                        <input type="hidden" name="university" value="{{ request('university') }}">
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                        <div class="default-exp-wrapper">
                            <div class="filter-inner">
                                <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Subject</span>
                                    <select name="subject" onchange="this.form.submit()">
                                        <option value="">All Subjects</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->name }}" {{ request('subject') == $subject->name ? 'selected' : '' }}>{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Study Level</span>
                                    <select name="study_level" onchange="this.form.submit()">
                                        <option value="">All Levels</option>
                                        <option value="Undergraduate" {{ request('study_level') == 'Undergraduate' ? 'selected' : '' }}>Undergraduate</option>
                                        <option value="Postgraduate" {{ request('study_level') == 'Postgraduate' ? 'selected' : '' }}>Postgraduate</option>
                                        <option value="Diploma" {{ request('study_level') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                        <option value="Certificate" {{ request('study_level') == 'Certificate' ? 'selected' : '' }}>Certificate</option>
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Filter By Country</span>
                                    <select name="country" onchange="this.form.submit()">
                                        <option value="">All Countries</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ request('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Filter By University</span>
                                    <select name="university" onchange="this.form.submit()">
                                        <option value="">All Universities</option>
                                        @foreach($universities as $university)
                                            <option value="{{ $university->id }}" {{ request('university') == $university->id ? 'selected' : '' }}>{{ $university->university_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Sort By</span>
                                    <select name="sort" onchange="this.form.submit()">
                                        <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Latest</option>
                                        <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Popularity</option>
                                        <option value="trending" {{ request('sort') == 'trending' ? 'selected' : '' }}>Trending</option>
                                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                    </select>
                                </div>
                            </div>




                            <div class="filter-select-option">
                                <div class="filter-select">
                                    {{-- <span class="select-label d-block">Price Range</span> --}}

                        <div class="price_filter s-filter clear">

                                </div>


                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End Filter Toggle  -->
                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="inner">
            <div class="container">
                <div id="courses-container" class="row g-5">
                    @if($courses->count() > 0)
                        @foreach($courses as $course)
                        <!-- Grid View -->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 sal-animate course-grid-item" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="{{ route('courseDetails2', $course->slug) }}">
                                        <img src="{{ $course->images ? asset($course->images) : asset('assets/images/course/course-online-01.jpg') }}" alt="{{ $course->course_name }}">
                                        @if($course->off_price && $course->current_price)
                                            <div class="rbt-badge-3 bg-white">
                                                <span>-{{ round((($course->current_price - $course->off_price) / $course->current_price) * 100) }}%</span>
                                                <span>Off</span>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-card-top">
                                        <div class="rbt-review">
                                            <div class="rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= floor($course->rating ?? 0) ? '' : 'text-muted' }}"></i>
                                                @endfor
                                            </div>
                                            <span class="rating-count"> ({{ $course->enrolled ?? 0 }} Reviews)</span>
                                        </div>
                                        <div class="rbt-bookmark-btn">
                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                        </div>
                                    </div>

                                    <h4 class="rbt-card-title"><a href="{{ route('courseDetails2', $course->slug) }}">{{ $course->course_name }}</a></h4>

                                    <ul class="rbt-meta">
                                        <li><i class="feather-home"></i>{{ $course->university->university_name ?? 'University' }}</li>
                                        @if($course->university && $course->university->country)
                                            <li><i class="feather-map-pin"></i>{{ $course->university->country->name }}</li>
                                        @endif
                                    </ul>

                                    {{-- @if($course->instructor)
                                        <div class="rbt-author-meta mb--10">
                                            <div class="rbt-avater">
                                                <a href="#">
                                                    <img src="{{ asset('storage/assets/images/team/team-02.jpg') }}" alt="Sophia Jaymes">
                                                </a>
                                            </div>
                                            <div class="rbt-author-info">
                                                By <a href="#">{{ $course->instructor->name ?? 'Instructor' }}</a>
                                            </div>
                                        </div>
                                    @endif --}}
                                    <div class="rbt-card-bottom">
                                        <a class="rbt-btn-link" href="{{ route('courseDetails2', $course->slug) }}">Learn More<i class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- List View -->
                        <div class="col-12 sal-animate course-list-item" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="display: none;">
                            <div class="rbt-card card-list variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="{{ route('courseDetails2', $course->slug) }}">
                                        <img src="{{ $course->images ? asset($course->images) : asset('assets/images/course/course-online-01.jpg') }}" alt="{{ $course->course_name }}">
                                        @if($course->off_price && $course->current_price)
                                            <div class="rbt-badge-3 bg-white">
                                                <span>-{{ round((($course->current_price - $course->off_price) / $course->current_price) * 100) }}%</span>
                                                <span>Off</span>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <div class="rbt-card-top">
                                        <div class="rbt-review">
                                            <div class="rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= floor($course->rating ?? 0) ? '' : 'text-muted' }}"></i>
                                                @endfor
                                            </div>
                                            <span class="rating-count"> ({{ $course->enrolled ?? 0 }} Reviews)</span>
                                        </div>
                                        <div class="rbt-bookmark-btn">
                                            <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                        </div>
                                    </div>

                                    <h4 class="rbt-card-title"><a href="{{ route('courseDetails2', $course->slug) }}">{{ $course->course_name }}</a></h4>

                                    <ul class="rbt-meta">
                                        <li><i class="feather-home"></i>{{ $course->university->university_name ?? 'University' }}</li>
                                        @if($course->university && $course->university->country)
                                            <li><i class="feather-map-pin"></i>{{ $course->university->country->name }}</li>
                                        @endif
                                    </ul>

                                    <p class="rbt-card-text">{{ Str::limit($course->description ?? 'No description available.', 150) }}</p>

                                    @if($course->instructor)
                                        <div class="rbt-author-meta mb--10">
                                            <div class="rbt-avater">
                                                <a href="#">
                                                    <img src="{{ asset('storage/assets/images/team/team-02.jpg') }}" alt="Sophia Jaymes">
                                                </a>
                                            </div>
                                            <div class="rbt-author-info">
                                                By <a href="#">{{ $course->instructor->name ?? 'Instructor' }}</a>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="rbt-card-bottom">
                                        <a class="rbt-btn-link" href="{{ route('courseDetails2', $course->slug) }}">Learn More<i class="feather-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="rbt-not-found text-center py-5">
                                <div class="inner">
                                    <h3 class="rbt-title-style-2">No Courses Found</h3>
                                    <p class="description mt--20">Sorry, we couldn't find any courses matching your criteria. Try adjusting your filters or search terms.</p>
                                    <div class="read-more-btn mt--30">
                                        <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('courseFilterOneOpen') }}">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">View All Courses</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div id="pagination-container" class="row">
                    <div class="col-lg-12 mt--60">
                        <nav>
                            <ul class="rbt-pagination">
                                {{ $courses->appends(request()->query())->links('vendor.pagination.custom') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-separator/>
    @include('frontend-partials.footer')

@push('styles')
<style>
.filter-select select {
    position: relative;
    z-index: 999 !important;
}

.filter-select-option {
    position: relative;
    z-index: 999;
}

.filter-inner {
    position: relative;
    z-index: 998;
}

.default-exp-wrapper {
    position: relative;
    z-index: 997;
}

/* Ensure dropdown options appear above other elements */
.filter-select select option {
    z-index: 1000;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {

    // Price range slider
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 1000,
        values: [{{ request('min_price', 0) }}, {{ request('max_price', 1000) }}],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            $("#min_price").val(ui.values[0]);
            $("#max_price").val(ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

    // AJAX filtering function
    function filterCourses(formData) {
        $.ajax({
            url: '{{ route("courseFilterOneOpen") }}',
            method: 'GET',
            data: formData,
            beforeSend: function() {
                $('#courses-container').html('<div class="col-12 text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            },
            success: function(response) {
                // Update courses container
                $('#courses-container').html($(response).find('#courses-container').html());

                // Update pagination
                $('#pagination-container').html($(response).find('#pagination-container').html());

                // Update course count in header
                $('.rbt-badge-2').html($(response).find('.rbt-badge-2').html());

                // Update showing results text
                $('.course-index').html($(response).find('.course-index').html());

                // Re-initialize any dynamic elements if needed
                // Add history state
                history.pushState(null, '', '?' + $.param(formData));
            },
            error: function() {
                alert('An error occurred while filtering. Please try again.');
            }
        });
    }

    // Handle all select changes to update hidden inputs and submit form
    $('#filter-form select').on('change', function() {
        var selectName = $(this).attr('name');
        var selectValue = $(this).val();
        
        // Update corresponding hidden input
        $('#filter-form input[name="' + selectName + '"]').val(selectValue);
        
        // Submit form
        $('#filter-form')[0].submit();
    });



    // Handle search form submission to preserve all filters
    $('.rbt-search-style').on('submit', function(e) {
        // Let the form submit normally to preserve all filters
        return true;
    });

    // AJAX price filter
    $('#price-filter-form').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        filterCourses(formData);
    });

    // Handle pagination clicks via AJAX
    $(document).on('click', '.rbt-pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var urlParams = new URLSearchParams(url.split('?')[1]);
        var formData = urlParams.toString();
        filterCourses(formData);
    });

    // Handle view switching
    $('.rbt-grid-view').on('click', function() {
        $('.rbt-grid-view').addClass('active');
        $('.rbt-list-view').removeClass('active');
        $('.course-grid-item').show();
        $('.course-list-item').hide();
    });

    $('.rbt-list-view').on('click', function() {
        $('.rbt-list-view').addClass('active');
        $('.rbt-grid-view').removeClass('active');
        $('.course-grid-item').hide();
        $('.course-list-item').show();
    });
});
</script>
@endpush
@endsection

