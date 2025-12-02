<div class="rbt-related-course-area bg-color-white rbt-section-gap">
    <div class="container">
        <div class="section-title mb--30">
            <span class="subtitle bg-primary-opacity">More Similar Courses</span>
            <h4 class="title">Related Courses</h4>
        </div>
        <div class="row g-5">
            @forelse($relatedCourses as $rc)
                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('courseDetails2', [$rc->slug ?? $rc->id]) }}">
                                @if($rc->images)
                                    <img src="{{ asset($rc->images) }}" alt="{{ $rc->course_name }}">
                                @else
                                    <img src="{{ asset('assets/images/course/course-online-01.jpg') }}" alt="{{ $rc->course_name }}">
                                @endif
                                @if (!empty($rc->off_price) && !empty($rc->current_price))
                                    @php
                                        $offPrice = (float) ($rc->off_price ?? 0);
                                        $currentPrice = (float) ($rc->current_price ?? 0);
                                        $discountPercent = $offPrice > 0 ? round((1 - $currentPrice / max(1, $offPrice)) * 100) : 0;
                                    @endphp
                                    <div class="rbt-badge-3 bg-white">
                                        <span>-{{ $discountPercent }}%</span>
                                        <span>Off</span>
                                    </div>
                                @endif
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <div class="rbt-card-top">
                                <div class="rbt-review">
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fas fa-star {{ $i < round((float) ($rc->rating ?? 0)) ? '' : 'text-muted' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="rating-count"> ({{ rand(1, 40) }} Reviews)</span>
                                </div>
                                <div class="rbt-bookmark-btn">
                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                                </div>
                            </div>

                            <h4 class="rbt-card-title">
                                <a href="{{ route('courseDetails2', [$rc->slug ?? $rc->id]) }}">{{ $rc->course_name }}</a>
                            </h4>

                            <ul class="rbt-meta">
                                @if($rc->university)
                                    <li><i class="feather-home"></i>{{ $rc->university->university_name }}</li>
                                @endif
                                @if($rc->city)
                                    <li><i class="feather-map-pin"></i>{{ $rc->city }}</li>
                                @endif
                            </ul>

                            <p class="rbt-card-text">
                                {!! \Illuminate\Support\Str::limit($rc->description ?? 'No description available.', 100) !!}
                            </p>
                            <div class="rbt-author-meta mb--20">
                                <div class="rbt-avater">
                                    <a href="#">
                                        <img src="{{ optional($rc->instructor)->avatar ? asset(optional($rc->instructor)->avatar) : asset('assets/images/client/avatar-02.png') }}" alt="{{ optional($rc->instructor)->name ?? 'Instructor' }}">
                                    </a>
                                </div>
                                <div class="rbt-author-info">
                                    By <a href="{{ route('profile') }}">{{ optional($rc->instructor)->name ?? 'Instructor' }}</a>
                                    In <a href="#">{{ optional($rc->university)->university_name ?? 'Category' }}</a>
                                </div>
                            </div>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">${{ $rc->current_price ?? '0' }}</span>
                                    @if (!empty($rc->off_price))
                                        <span class="off-price">${{ $rc->off_price }}</span>
                                    @endif
                                </div>
                                <a class="rbt-btn-link" href="{{ route('courseDetails2', [$rc->slug ?? $rc->id]) }}">Learn More<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            @empty
                <div class="col-12">
                    <div class="text-center">
                        <p>No related courses found.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($relatedCourses->hasPages())
            <div class="row" style="margin-top:20px;">
                <div class="col-lg-12">
                    <nav class="rbt-pagination-wrapper" aria-label="Page navigation">
                        {{ $relatedCourses->links('vendor.pagination.custom') }}
                    </nav>
                </div>
            </div>
        @endif
    </div>
</div>