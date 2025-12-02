@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
@endphp

@section('content')
     @include('frontend-partials.header')
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
                                <li class="rbt-breadcrumb-item active">All Blog</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">All Blog</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div> {{ $blogs->total() }} Articles
                                </a>
                            </div>

                            <p class="description">Blog that help beginner designers become true unicorns. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
        </div>
    </div>

    <!-- Start Card Style -->
    <div class="rbt-blog-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">

            <!-- Start Card Area -->
            <div class="row g-5">
                @if($blogs->count() > 0)
                    @foreach($blogs as $index => $blog)
                        @if($index == 0)
                            <!-- Start Single Card (Featured) -->
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                <div class="rbt-card variation-02 height-330 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">
                                            <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('assets/images/blog/blog-card-01.jpg') }}" alt="{{ $blog->title }}"> </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h3 class="rbt-card-title"><a href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">{{ $blog->title }}</a></h3>
                                        <p class="rbt-card-text">{{ Str::limit($blog->excerpt ?? $blog->content, 100) }}</p>
                                        <div class="rbt-card-bottom">
                                            <a class="transparent-button" href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">Read More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Card  -->
                        @else
                            @if($index == 1)
                                <div class="col-lg-6 col-md-12 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            @endif
                                <!-- Start Single Card  -->
                                <div class="rbt-card card-list variation-02 rbt-hover {{ $index > 1 ? 'mt--30' : '' }}">
                                    <div class="rbt-card-img">
                                        <a href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">
                                            <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('assets/images/blog/blog-card-0' . ($index % 4 + 1) . '.jpg') }}" alt="{{ $blog->title }}"> </a>
                                    </div>
                                    <div class="rbt-card-body">
                                        <h5 class="rbt-card-title"><a href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">{{ $blog->title }}</a></h5>
                                        <div class="rbt-card-bottom">
                                            <a class="transparent-button" href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">Read Article<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Card  -->
                            @if($index == 4)
                                </div>
                            @endif
                        @endif
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="text-center">
                            <h4>No blogs available at the moment.</h4>
                            <p>Please check back later for new content.</p>
                        </div>
                    </div>
                @endif
            </div>
            <!-- End Card Area -->

            <!-- Start Card Area -->
            <div class="row g-5 mt--15">
                @if($blogs->count() > 5)
                    @foreach($blogs->skip(5) as $blog)
                        <!-- Start Single Card  -->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="rbt-card variation-02 rbt-hover">
                                <div class="rbt-card-img">
                                    <a href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">
                                        <img src="{{ $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('assets/images/blog/blog-grid-0' . (($loop->index % 6) + 1) . '.jpg') }}" alt="{{ $blog->title }}"> </a>
                                </div>
                                <div class="rbt-card-body">
                                    <h5 class="rbt-card-title"><a href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">{{ $blog->title }}</a></h5>
                                    <p class="rbt-card-text">{{ Str::limit($blog->excerpt ?? $blog->content, 80) }}</p>
                                    <div class="rbt-card-bottom">
                                        <a class="transparent-button" href="{{ route('blogDetails', $blog->slug ?? $blog->id) }}">Read
                                            More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->
                    @endforeach
                @endif
            </div>
            <!-- End Card Area -->

            <!-- End Card Area -->
            @if($blogs->hasPages())
                <div class="row">
                    <div class="col-lg-12 mt--60">
                        {{ $blogs->links() }}
                    </div>
                </div>
            @endif


        </div>
    </div>
    <!-- End Card Style -->

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>

    @include('frontend-partials.footer')
@endsection
