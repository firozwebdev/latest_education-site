@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
@endphp

@section('content')
    @include('frontend-partials.header')

    <x-sideVav />

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper">
        <div class="rbt-banner-image rbt-breadcrumb-default">
            <img src="{{ $universityModel->logo ? asset($universityModel->logo) : asset('assets/images/bg/london_001.png') }}"
                alt="{{ $universityModel->university_name }}">
        </div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-wrapper">
                                <h1 class="title mb--0">{{ $universityModel->university_name }}</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">📚</div> {{ $courses->total() }} Courses
                                </a>
                            </div>
                            <p class="description">{{ $universityModel->country->name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="inner">
            <div class="container">
                <div class="row g-5">
                    @forelse($courses as $course)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="{{ route('courseDetails2', $course->slug) }}">
                                        <img src="{{ $course->images ? asset( $course->images) : asset('assets/images/course/course-online-01.jpg') }}"
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
                                            <span class="rating-count">({{ $course->enrolled ?? 0 }} Reviews)</span>
                                        </div>
                                    </div>
                                    <h4 class="rbt-card-title">
                                        <a href="{{ route('courseDetails2', $course->slug) }}">{{ $course->course_name }}</a>
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li><i class="feather-book"></i>{{ $course->subject->name ?? 'Subject' }}</li>
                                        <li><i class="feather-award"></i>{{ $course->student_level ?? 'Level' }}</li>
                                    </ul>
                                    <div class="rbt-card-bottom">
                                        <a class="rbt-btn-link" href="{{ route('courseDetails2', $course->slug) }}">
                                            Learn More<i class="feather-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <h3 class="rbt-title-style-2">No courses found</h3>
                                <p>Please check back later for new courses.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if ($courses->hasPages())
                    <div class="row">
                        <div class="col-lg-12 mt--60">
                            {{ $courses->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-separator />

    @include('frontend-partials.footer')

@endsection
