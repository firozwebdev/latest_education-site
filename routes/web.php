<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ElementsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SuccessDeliveryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AssessmentController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\NewsletterController;

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home')->name('marketplace');
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/book-appointment', 'bookAppointment')->name('book-appointment');
    Route::post('/book-appointment', 'storeAppointment')->name('book-appointment.store');
    Route::get('/take-assessment', 'takeAssessment')->name('take-assessment');
    Route::post('/take-assessment', 'storeAssessment')->name('take-assessment.store');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/about-us', 'about')->name('about');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
    Route::get('/terms-of-service', 'termsService')->name('terms-of-service');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/future-career', 'future_career')->name('future-career');
    Route::prefix('services')
        ->name('services.')
        ->group(function () {
            Route::get('admission', 'admission')->name('admission');
            Route::get('scholarship', 'scholarship')->name('scholarship');
            Route::get('visa-guidance', 'visaGuidance')->name('visa-guidance');
            Route::get('departure-guidance', 'departureGuidance')->name('departure-guidance');
            Route::get('ielts-registration', 'ieltsRegistration')->name('ielts-registration');
            Route::get('career-counselling', 'careerCounsel')->name('career-counsel');
        });
    Route::prefix('resources')
        ->name('resources.')
        ->group(function () {
            Route::get('events', 'event')->name('event');
            Route::get('/events-details/{event?}', 'eventDetails')->name('event-details');
            Route::get('blogs', 'blog')->name('blog');
            Route::get('top-universities', 'topUniversity')->name('top-university');
            Route::get('popular-subjects', 'popularSubject')->name('popular-subject');
            Route::get('student-essentials', 'studentEssential')->name('student-essential');
        });

    // Blog listing route
    Route::get('/resources/blogs', [BlogController::class, 'blog'])->name('resources.blog');
});

// Contact form submission route
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Newsletter subscription route
Route::post('/newsletter', [App\Http\Controllers\PagesController::class, 'storeNewsletter'])->name('newsletter.store');
Route::controller(CoursesController::class)->group(function () {
    Route::get('/course', 'courseCard2')->name('courseCard2');
});

// Route::get('/contact' ,'contact')->name('contact');

//  demo
Route::prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'blog')->name('blog');
        Route::get('/blog-details/{blog?}', 'blogDetails')->name('blogDetails');
        Route::get('/blog-grid-minimal', 'blogGridMinimal')->name('blogGridMinimal');
        Route::get('/blog-list', 'blogList')->name('blogList');
        Route::get('/blog-with-sidebar', 'blogWithSidebar')->name('blogWithSidebar');
        Route::get('/post-format-audio', 'postFormatAudio')->name('postFormatAudio');
        Route::get('/post-format-gallery', 'postFormatGallery')->name('postFormatGallery');
        Route::get('/post-format-quote', 'postFormatQuote')->name('postFormatQuote');
        Route::get('/post-format-standard', 'postFormatStandard')->name('postFormatStandard');
        Route::get('/post-format-video', 'postFormatVideo')->name('postFormatVideo');
    });
});

//  courses
Route::prefix('courses')->group(function () {
    Route::controller(CoursesController::class)->group(function () {
        //Route::get('/course-card-2','courseCard2')->name('courseCard2');
        Route::get('/course-card-3', 'courseCard3')->name('courseCard3');
        Route::get('/course-details', 'courseDetails')->name('courseDetails');
        // allow optional parameter so templates can link to the course-details-2 route without a specific course
        Route::get('/course-details-2/{course?}', 'courseDetails2_show')->name('courseDetails2'); // dynamic course by slug or id
        Route::get('/course-details-3', 'courseDetails3')->name('courseDetails3');
        Route::get('/course-filter-one-open', 'courseFilterOneOpen')->name('courseFilterOneOpen');
        Route::get('/course-filter-one-toggle', 'courseFilterOneToggle')->name('courseFilterOneToggle');
        Route::get('/course-filter-two-open', 'courseFilterTwoOpen')->name('courseFilterTwoOpen');
        Route::get('/course-filter-two-toggle', 'courseFilterTwoToggle')->name('courseFilterTwoToggle');
        Route::get('/course-masonry', 'courseMasonry')->name('courseMasonry');
        Route::get('/course-with-sidebar', 'courseWithSidebar')->name('courseWithSidebar');
        Route::get('/course-with-tab', 'courseWithTab')->name('courseWithTab');
        Route::get('/course-with-tab-two', 'courseWithTabTwo')->name('courseWithTabTwo');
        Route::get('/create-course', 'createCourse')->name('createCourse');
        Route::get('/instructor-course', 'instructorCourse')->name('instructorCourse');
        Route::get('/lesson', 'lesson')->name('lesson');
    });
});

//  Instructor-dashboard
Route::prefix('dashboard')->group(function () {
    Route::prefix('instructor-dashboard')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/instructor-announcements', 'instructorAnnouncements')->name('instructorAnnouncements');
            Route::get('/instructor-assignments', 'instructorAssignments')->name('instructorAssignments');
            Route::get('/instructor-dashboard', 'instructorDashboard')->name('instructorDashboard');
            Route::get('/instructor-enrolled-courses', 'instructorEnrolledCourses')->name('instructorEnrolledCourses');
            Route::get('/instructor-my-quizAttempts', 'instructorMyQuizAttempts')->name('instructorMyQuizAttempts');
            Route::get('/instructor-orderHistory', 'instructorOrderHistory')->name('instructorOrderHistory');
            Route::get('/instructor-profile', 'instructorProfile')->name('instructorProfile');
            Route::get('/instructor-quiz-attempts', 'instructorQuizAttempts')->name('instructorQuizAttempts');
            Route::get('/instructor-reviews', 'instructorReviews')->name('instructorReviews');
            Route::get('/instructor-settings', 'instructorSettings')->name('instructorSettings');
            Route::get('/instructor-wishlist', 'instructorWishlist')->name('instructorWishlist');
        });
    });
});

//  student-dashboard
Route::prefix('dashboard')->group(function () {
    Route::prefix('student-dashboard')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/student-dashboard', 'studentDashboard')->name('studentDashboard');
            Route::get('/student-enrolled-courses', 'studentEnrolledCourses')->name('studentEnrolledCourses');
            Route::get('/student-my-quiz-attempts', 'studentMyQuizAttempts')->name('studentMyQuizAttempts');
            Route::get('/student-order-history', 'studentOrderHistory')->name('studentOrderHistory');
            Route::get('/student-profile', 'studentProfile')->name('studentProfile');
            Route::get('/student-reviews', 'studentReviews')->name('studentReviews');
            Route::get('/student-settings', 'studentSettings')->name('studentSettings');
            Route::get('/student-wishlist', 'studentWishlist')->name('studentWishlist');
        });
    });
});

//  courses
Route::prefix('elements')->group(function () {
    Route::controller(ElementsController::class)->group(function () {
        //Route::get('/about', 'about')->name('about');
        Route::get('/accordion', 'accordion')->name('accordion');
        Route::get('/advancetab', 'advancetab')->name('advancetab');
        Route::get('/badge', 'badge')->name('badge');
        Route::get('/brand', 'brand')->name('brand');
        Route::get('/button', 'button')->name('button');
        Route::get('/call-to-action', 'callToAction')->name('callToAction');
        Route::get('/card', 'card')->name('card');
        Route::get('/category', 'category')->name('category');
        Route::get('/counterup', 'counterup')->name('counterup');
        Route::get('/gallery', 'gallery')->name('gallery');
        Route::get('/header', 'header')->name('header');
        Route::get('/instagram', 'instagram')->name('instagram');
        Route::get('/listStyle', 'listStyle')->name('listStyle');
        Route::get('/newsletter', 'newsletter')->name('newsletter');
        Route::get('/pricing', 'pricing')->name('pricing');
        Route::get('/progressbar', 'progressbar')->name('progressbar');
        Route::get('/search', 'search')->name('search');
        Route::get('/service', 'service')->name('service');
        Route::get('/social', 'social')->name('social');
        Route::get('/split', 'split')->name('split');
        Route::get('/style-guide', 'styleGuide')->name('styleGuide');
        Route::get('/team', 'team')->name('team');
        Route::get('/testimonial', 'testimonial')->name('testimonial');
    });
});

//  courses
Route::prefix('home')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/main-demo', 'mainDemo')->name('mainDemo');
        Route::get('/art-design-school', 'artDesignSchool')->name('artDesignSchool');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/classic-lms', 'classicLms')->name('classicLms');
        Route::get('/coaching', 'coaching')->name('coaching');
        Route::get('/course-school', 'courseSchool')->name('courseSchool');
        Route::get('/gym-coaching', 'gymCoaching')->name('gymCoaching');
        Route::get('/health-wellness-institute', 'healthWellnessInstitute')->name('healthWellnessInstitute');
        Route::get('/home-elegant', 'homeElegant')->name('homeElegant');
        Route::get('/home-technology', 'homeTechnology')->name('homeTechnology');
        Route::get('/instructor-course', 'instructorCourse')->name('instructorCourse');
        Route::get('/instructor-portfolio', 'instructorPortfolio')->name('instructorPortfolio');
        Route::get('/instructors-coaches', 'instructorsCoaches')->name('instructorsCoaches');
        Route::get('/islamic-center', 'islamicCenter')->name('islamicCenter');
        Route::get('/kindergarten', 'kindergarten')->name('kindergarten');
        Route::get('/language-academy', 'languageAcademy')->name('languageAcademy');
        Route::get('/life-coach', 'lifeCoach')->name('lifeCoach');
        //Route::get('/marketplace','marketplace')->name('marketplace'); //fixed-home page
        Route::get('/modern-university', 'modernUniversity')->name('modernUniversity');
        Route::get('/multilingual', 'multilingual')->name('multilingual');
        Route::get('/online-academy', 'onlineAcademy')->name('onlineAcademy');
        Route::get('/online-course', 'onlineCourse')->name('onlineCourse');
        Route::get('/online-school', 'onlineSchool')->name('onlineSchool');
        Route::get('/single-course', 'singleCourse')->name('singleCourse');
        Route::get('/udemy-affiliate', 'udemyAffiliate')->name('udemyAffiliate');
        Route::get('/university-classic', 'universityClassic')->name('universityClassic');
        Route::get('/university-status', 'universityStatus')->name('universityStatus');
        Route::get('/wishlist', 'wishlist')->name('wishlist');
    });
});

//  courses
Route::prefix('pages')->group(function () {
    Route::controller(pagesController::class)->group(function () {
        Route::get('/page-error', 'pageError')->name('pageError');
        Route::get('/aboutus-01', 'aboutus01')->name('aboutus01');
        Route::get('/aboutus-02', 'aboutus02')->name('aboutus02');
        Route::get('/academy-gallery', 'academyGallery')->name('academyGallery');
        Route::get('/admission-guide', 'admissionGuide')->name('admissionGuide');
        Route::get('/become-teacher', 'becomeTeacher')->name('becomeTeacher');
        Route::get('/cart', 'cart')->name('cart');
        //Route::get('/contact' ,'contact')->name('contact');
        Route::get('/event-details', 'eventDetails')->name('eventDetails');
        Route::get('/event-grid', 'eventGrid')->name('eventGrid');
        Route::get('/event-list', 'eventList')->name('eventList');
        Route::get('/event-sidebar', 'eventSidebar')->name('eventSidebar');
        Route::get('/faqs', 'faqs')->name('faqs');
        Route::get('/instructor', 'instructor')->name('instructor');
        Route::get('/login', 'login')->name('login');
        Route::get('/maintenance', 'maintenance')->name('maintenance');
        Route::get('/myAccount', 'myAccount')->name('myAccount');
        Route::get('/privacy-policy', 'privacyPolicy')->name('privacyPolicy');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/shop', 'shop')->name('shop');
        Route::get('/single-product', 'singleProduct')->name('singleProduct');
        Route::get('/subscription', 'subscription')->name('subscription');
        Route::get('/wishlist-2', 'wishlist2')->name('wishlist2');
    });
});

//  courses
Route::prefix('main')->group(function () {
    Route::controller(MainController::class)->group(function () {
        Route::get('/all-questions', 'allQuestions')->name('allQuestions');
        Route::get('/elements', 'elements')->name('elements');
        Route::get('/header-layout', 'headerLayout')->name('headerLayout');
        Route::get('/lesson-assignments', 'lessonAssignments')->name('lessonAssignments');
        Route::get('/lesson-assignments-submit', 'lessonAssignmentsSubmit')->name('lessonAssignmentsSubmit');
        Route::get('/lesson-ntro', 'lessonIntro')->name('lessonIntro');
        Route::get('/lesson-quiz', 'lessonQuiz')->name('lessonQuiz');
        Route::get('/lesson-quiz-result', 'lessonQuizResult')->name('lessonQuizResult');
        Route::get('/modal', 'modal')->name('modal');
        Route::get('/pagination-quiz', 'paginationQuiz')->name('paginationQuiz');
        Route::get('/purchase-guide', 'purchaseGuide')->name('purchaseGuide');
        Route::get('/questions-types', 'questionsTypes')->name('questionsTypes');
        Route::get('/quiz-with-custom-timer', 'quizWithCustomTimer')->name('quizWithCustomTimer');
        Route::get('/quiz-with-point', 'quizWithPoint')->name('quizWithPoint');
        Route::get('/sample-page-one', 'samplePageOne')->name('samplePageOne');
        Route::get('/sample-page-two', 'samplePageTwo')->name('samplePageTwo');
        Route::get('/single-question', 'singleQuestion')->name('singleQuestion');
    });
});

// Admin routes
Route::prefix('admin')
    ->middleware('admin.auth')
    ->group(function () {
        Route::resource('subjects', App\Http\Controllers\Admin\SubjectController::class)->names([
            'index' => 'admin.subjects.index',
            'create' => 'admin.subjects.create',
            'store' => 'admin.subjects.store',
            'show' => 'admin.subjects.show',
            'edit' => 'admin.subjects.edit',
            'update' => 'admin.subjects.update',
            'destroy' => 'admin.subjects.destroy',
        ]);
        Route::resource('universities', UniversityController::class)->names([
            'index' => 'admin.universities.index',
            'create' => 'admin.universities.create',
            'store' => 'admin.universities.store',
            'show' => 'admin.universities.show',
            'edit' => 'admin.universities.edit',
            'update' => 'admin.universities.update',
            'destroy' => 'admin.universities.destroy',
        ]);
        Route::resource('testimonials', TestimonialController::class)->names([
            'index' => 'admin.testimonials.index',
            'create' => 'admin.testimonials.create',
            'store' => 'admin.testimonials.store',
            'show' => 'admin.testimonials.show',
            'edit' => 'admin.testimonials.edit',
            'update' => 'admin.testimonials.update',
            'destroy' => 'admin.testimonials.destroy',
        ]);
        Route::resource('branches', BranchController::class)->names([
            'index' => 'admin.branches.index',
            'create' => 'admin.branches.create',
            'store' => 'admin.branches.store',
            'show' => 'admin.branches.show',
            'edit' => 'admin.branches.edit',
            'update' => 'admin.branches.update',
            'destroy' => 'admin.branches.destroy',
        ]);
        Route::resource('events', EventController::class)->names([
            'index' => 'admin.events.index',
            'create' => 'admin.events.create',
            'store' => 'admin.events.store',
            'show' => 'admin.events.show',
            'edit' => 'admin.events.edit',
            'update' => 'admin.events.update',
            'destroy' => 'admin.events.destroy',
        ]);
        Route::resource('success-deliveries', SuccessDeliveryController::class)->names([
            'index' => 'admin.success-deliveries.index',
            'create' => 'admin.success-deliveries.create',
            'store' => 'admin.success-deliveries.store',
            'show' => 'admin.success-deliveries.show',
            'edit' => 'admin.success-deliveries.edit',
            'update' => 'admin.success-deliveries.update',
            'destroy' => 'admin.success-deliveries.destroy',
        ]);
        Route::resource('courses', CourseController::class)->names([
            'index' => 'admin.courses.index',
            'create' => 'admin.courses.create',
            'store' => 'admin.courses.store',
            'show' => 'admin.courses.show',
            'edit' => 'admin.courses.edit',
            'update' => 'admin.courses.update',
            'destroy' => 'admin.courses.destroy',
        ]);
        Route::get('courses-search', [CourseController::class, 'search'])->name('admin.courses.search');
        Route::get('universities-search', [UniversityController::class, 'search'])->name('admin.universities.search');
        Route::get('subjects-search', [App\Http\Controllers\Admin\SubjectController::class, 'search'])->name('admin.subjects.search');
        Route::get('testimonials-search', [TestimonialController::class, 'search'])->name('admin.testimonials.search');
        Route::get('branches-search', [BranchController::class, 'search'])->name('admin.branches.search');
        Route::get('events-search', [EventController::class, 'search'])->name('admin.events.search');
        Route::get('success-deliveries-search', [SuccessDeliveryController::class, 'search'])->name('admin.success-deliveries.search');

        // Blog routes
        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class)->names([
            'index' => 'admin.blogs.index',
            'create' => 'admin.blogs.create',
            'store' => 'admin.blogs.store',
            'show' => 'admin.blogs.show',
            'edit' => 'admin.blogs.edit',
            'update' => 'admin.blogs.update',
            'destroy' => 'admin.blogs.destroy',
        ]);
        Route::get('blogs-search', [\App\Http\Controllers\Admin\BlogController::class, 'search'])->name('admin.blogs.search');
        Route::resource('countries', App\Http\Controllers\Admin\CountryController::class)->names([
            'index' => 'admin.countries.index',
            'create' => 'admin.countries.create',
            'store' => 'admin.countries.store',
            'show' => 'admin.countries.show',
            'edit' => 'admin.countries.edit',
            'update' => 'admin.countries.update',
            'destroy' => 'admin.countries.destroy',
        ]);
        Route::get('countries-search', [App\Http\Controllers\Admin\CountryController::class, 'search'])->name('admin.countries.search');

        // Client Information routes
        Route::resource('contacts', ContactController::class)->names([
            'index' => 'admin.contacts.index',
            'create' => 'admin.contacts.create',
            'store' => 'admin.contacts.store',
            'show' => 'admin.contacts.show',
            'edit' => 'admin.contacts.edit',
            'update' => 'admin.contacts.update',
            'destroy' => 'admin.contacts.destroy',
        ]);
        Route::resource('assessments', AssessmentController::class)->names([
            'index' => 'admin.assessments.index',
            'create' => 'admin.assessments.create',
            'store' => 'admin.assessments.store',
            'show' => 'admin.assessments.show',
            'edit' => 'admin.assessments.edit',
            'update' => 'admin.assessments.update',
            'destroy' => 'admin.assessments.destroy',
        ]);
        Route::resource('appointments', AppointmentController::class)->names([
            'index' => 'admin.appointments.index',
            'create' => 'admin.appointments.create',
            'store' => 'admin.appointments.store',
            'show' => 'admin.appointments.show',
            'edit' => 'admin.appointments.edit',
            'update' => 'admin.appointments.update',
            'destroy' => 'admin.appointments.destroy',
        ]);
        Route::resource('newsletters', NewsletterController::class)->names([
            'index' => 'admin.newsletters.index',
            'create' => 'admin.newsletters.create',
            'store' => 'admin.newsletters.store',
            'show' => 'admin.newsletters.show',
            'edit' => 'admin.newsletters.edit',
            'update' => 'admin.newsletters.update',
            'destroy' => 'admin.newsletters.destroy',
        ]);

        // Search routes for client information
        Route::get('contacts-search', [ContactController::class, 'search'])->name('admin.contacts.search');
        Route::get('assessments-search', [AssessmentController::class, 'search'])->name('admin.assessments.search');
        Route::get('appointments-search', [AppointmentController::class, 'search'])->name('admin.appointments.search');
        Route::get('newsletters-search', [NewsletterController::class, 'search'])->name('admin.newsletters.search');
    });

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [App\Http\Controllers\Admin\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\AdminAuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});
