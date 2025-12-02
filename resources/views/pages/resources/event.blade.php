@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
@endphp

@section('content')

    @include('frontend-partials.header')

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
                                <li class="rbt-breadcrumb-item active">All Event</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">All Event</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div> {{ $events->total() }} Events
                                </a>
                            </div>
                            <p class="description" align="justify">At KMF Global Education Ltd, we are dedicated to empowering students on their journey to study abroad, staying in tune with the latest developments in international education. Our mission is to help learners explore both traditional and emerging study destinations through personalized guidance that aligns with their academic goals and personal aspirations. We place strong emphasis on mental health and well-being, ensuring students have access to the right support systems as they adapt to new cultural and educational environments. At the same time, we champion sustainability and ethical education practices, making them central to a responsible and rewarding global learning experience. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
        </div>
    </div>

    <div class="rbt-counterup-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row g-5">
                @foreach($events as $event)
                <!-- Start Single Event  -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="rbt-card event-grid-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('resources.event-details', $event->id) }}">
                                <img src="{{ asset($event->logo ?? 'assets/images/event/grid-type-01.jpg') }}" alt="Card image">
                                <div class="rbt-badge-3 bg-white">
                                    <span>{{ \Carbon\Carbon::parse($event->date)->format('d M') }}</span>
                                    <span>{{ \Carbon\Carbon::parse($event->date)->format('Y') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <ul class="rbt-meta">
                                <li><i class="feather-map-pin"></i>{{ $event->location_name ?? 'Location' }}</li>
                                <li><i class="feather-clock"></i>{{ $event->time ?? 'Time' }}</li>
                            </ul>
                            <h4 class="rbt-card-title"><a href="{{ route('resources.event-details', $event->id) }}">{{ $event->event_name }}</a></h4>

                            <div class="read-more-btn">
                                <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round" href="{{ route('resources.event-details', $event->id) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Get Booking</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Event  -->
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 mt--60">
                    {{ $events->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

    <x-separator/>
    @include('frontend-partials.footer')

@endsection
