@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
@endphp

@section('content')
    @include('frontend-partials.header')

    <!-- Start Side Vav -->
    <x-sideVav />
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image rbt-breadcrumb-default">
            <img src="{{ $country && $country->image ? asset('storage/' . $country->image) : asset('assets/images/bg/london_001.png') }}"
                alt="{{ $country ? $country->name : 'Education' }} Images">
        </div>
        <div class="rbt-banner-content">

            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Breadcrumb Area  -->
                            {{-- <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">All Courses</li>
                            </ul> --}}
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">POPULAR COURSES</h1>
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

            <!-- End Course Top  -->
        </div>
    </div>
    <!-- End Banner BG Image  -->
    <div class="rbt-banner-content">

        <!-- Start Banner Content Top  -->
        {{-- <div class="rbt-banner-content-top">
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
                                    <div class="image">🎉</div> {{ $courses->count() }} Courses
                                </a>
                            </div>

                            <p class="description">Courses that help beginner designers become true unicorns. </p>
                        </div>
                    </div>
                </div>
            </div> --}}
        <!-- End Banner Content Top  -->
        <!-- Start Course Top  -->
        <div class="rbt-course-top-wrapper mt--40 mt_sm--20">
            <div class="container">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-5 col-md-12">
                        <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                            <div class="rbt-short-item switch-layout-container">
                                <ul class="course-switch-layout">
                                    <li class="course-switch-item"><button class="rbt-grid-view active"
                                            title="Grid Layout"><i class="feather-grid"></i> <span
                                                class="text">Grid</span></button></li>
                                    <li class="course-switch-item"><button class="rbt-list-view" title="List Layout"><i
                                                class="feather-list"></i> <span class="text">List</span></button></li>
                                </ul>
                            </div>
                            <div class="rbt-short-item">
                                <span class="course-index">Showing
                                    {{ $courses->firstItem() ?? 0 }}-{{ $courses->lastItem() ?? 0 }} of
                                    {{ $courses->total() }} results</span>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-7 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form action="#" class="rbt-search-style me-0">
                                        <input type="text" placeholder="Search Your Course..">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="rbt-short-item">
                                    <div class="view-more-btn text-start text-sm-end">
                                        <button class="discover-filter-button discover-filter-activation rbt-btn btn-white btn-md radius-round">Filter<i class="feather-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                </div>


            </div>
        </div>
        <!-- End Course Top  -->
    </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="inner">
            <div class="container">
                <div class="rbt-course-grid-column">

                    <!-- Start course old Card  -->
                    <div class="row g-5">
                        @forelse($courses as $course)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 sal-animate" data-sal-delay="150"
                                data-sal="slide-up" data-sal-duration="800">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ route('courseDetails2', $course->slug) }}">
                                            <img src="{{ 'storage/' . $course->images ? asset($course->images) : asset('assets/images/course/course-online-01.jpg') }}"
                                                alt="{{ $course->course_name }}">
                                            @if ($course->off_price && $course->current_price)
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
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= floor($course->rating ?? 0))
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="fas fa-star text-muted"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <span class="rating-count"> ({{ $course->enrolled ?? 0 }} Reviews)</span>
                                            </div>
                                            <div class="rbt-bookmark-btn">
                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                        class="feather-bookmark"></i></a>
                                            </div>
                                        </div>

                                        <h4 class="rbt-card-title">

                                            <a
                                                href="{{ route('courseDetails2', [$course->slug ?? $course->id]) }}">{{ $course->course_name }}</a>
                                        </h4>

                                        <ul class="rbt-meta">
                                            <li><i
                                                    class="feather-home"></i>{{ $course->university->university_name ?? 'University' }}
                                            </li>
                                            @if ($course->university && $course->university->country)
                                                <li><i class="feather-map-pin"></i>{{ $course->university->country->name }}
                                                </li>
                                            @endif
                                        </ul>

                                        {{-- @if ($course->instructor)
                                                            <div class="rbt-author-meta mb--10">
                                                                <div class="rbt-avater">
                                                                    <a href="#">
                                                                        <img src="{{ $course->instructor->profile_image ?? 'http://localhost:8000/assets/images/team/avatar-01.jpg' }}" alt="Author Images">
                                                                    </a>
                                                                </div>
                                                                <div class="rbt-author-info">
                                                                    By <a href="#">{{ $course->instructor->name ?? 'Instructor' }}</a>
                                                                </div>
                                                            </div>
                                                        @endif --}}
                                        <div class="rbt-card-bottom">

                                            <a class="rbt-btn-link"
                                                href="{{ route('courseDetails2', [$course->slug ?? $course->id]) }}">Learn
                                                More<i class="feather-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <h3 class="rbt-title-style-2">No courses found for this country</h3>
                                    <p>Please explore other countries or check back later for new opportunities.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!-- End Single Card  -->



                    <!-- End Single Card  -->
                </div>

                @if ($courses->hasPages())
                    <div class="row">
                        <div class="col-lg-12 mt--60">
                            {{ $courses->appends(request()->query())->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <x-separator />


    @include('frontend-partials.footer')

    <!-- End Copyright Area  -->

@endsection
