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
            <img src="{{ $countryModel->image ? asset( 'storage/' .$countryModel->image) : asset('assets/images/bg/london_001.png') }}"
                alt="{{ $countryModel->name }} Universities">
        </div>
        <div class="rbt-banner-content">
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title-wrapper">
                                <h1 class="title mb--0">Universities in {{ $countryModel->name }}</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎓</div> {{ $universities->total() }} Universities
                                </a>
                            </div>
                            <p class="description">Explore top universities and their programs</p>
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
                    @forelse($universities as $university)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="rbt-card variation-01 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="{{ route('university.courses', $university->id) }}">
                                        <img src="{{ $university->logo ? asset( $university->logo) : asset('assets/images/course/course-online-01.jpg') }}"
                                            alt="{{ $university->university_name }}">
                                    </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h4 class="rbt-card-title">
                                        <a href="{{ route('university.courses', $university->id) }}">{{ $university->university_name }}</a>
                                    </h4>
                                    <ul class="rbt-meta">
                                        <li><i class="feather-map-pin"></i>{{ $countryModel->name }}</li>
                                        <li><i class="feather-book"></i>{{ $university->courses_count }} Courses</li>
                                    </ul>
                                    <div class="rbt-card-bottom">
                                        <a class="rbt-btn-link" href="{{ route('university.courses', $university->id) }}">
                                            View Courses<i class="feather-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <h3 class="rbt-title-style-2">No universities found</h3>
                                <p>Please check back later for new opportunities.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                @if ($universities->hasPages())
                    <div class="row">
                        <div class="col-lg-12 mt--60">
                            {{ $universities->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-separator />

    @include('frontend-partials.footer')

@endsection
