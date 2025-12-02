<div class="rbt-featured-course bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row g-5 align-items-end mb--60">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="section-title text-start">
                    <h2 class="title">RELATED COURSES</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="load-more-btn text-start text-lg-end">
                    <a class="rbt-btn btn-border icon-hover radius-round" href="{{ route('courseCard2') }}">
                        <span class="btn-text">BROWSE ALL KMF COURSE</span>
                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Start Card Area -->
        <div class="row g-5">
            @forelse($courses as $course)
                <div class="col-lg-4 col-md-6 col-sm-12 col-12 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('courseDetails2', $course->slug ?? $course->id) }}">
                                @if($course->images)
                                    <img src="{{ asset( $course->images) }}" alt="{{ $course->course_name }}">
                                @else
                                    <img src="{{ asset('assets/images/course/course-online-01.jpg') }}" alt="{{ $course->course_name }}">
                                @endif
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <div class="rbt-card-top">
                                <div class="rbt-review">
                                    <div class="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star text-muted"></i>
                                        @endfor
                                    </div>
                                    <span class="rating-count"> (0 Reviews)</span>
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                </div>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="{{ route('courseDetails2', $course->slug ?? $course->id) }}">{{ $course->course_name }}</a>
                            </h4>

                            <ul class="rbt-meta">
                                @if($course->university)
                                    <li><i class="feather-home"></i>{{ $course->university->university_name }}</li>
                                @endif
                                @if($course->city)
                                    <li><i class="feather-map-pin"></i>{{ $course->city }}</li>
                                @endif
                                @if($course->duration)
                                    <li><i class="feather-clock"></i>{{ $course->duration }}</li>
                                @endif
                            </ul>

                            <div class="rbt-card-bottom">
                                <a class="rbt-btn-link" href="{{ route('courseDetails2', $course->slug ?? $course->id) }}">
                                    Learn More<i class="feather-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center">
                        <p>No courses available at the moment.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <!-- End Card Area -->

        <!-- Pagination -->
        @if($courses->hasPages())
            <div class="row" style="margin-top:20px;">
                <div class="col-lg-12">
                    <nav class="rbt-pagination-wrapper" aria-label="Page navigation">
                        {{ $courses->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            </div>
        @endif
    </div>
</div>