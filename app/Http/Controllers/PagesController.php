<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use App\Models\University;
use App\Models\Subject;
use App\Models\Appointment;
use App\Models\Assessment;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function pageError()
    {
        return view('pages/pageError');
    }

    public function about()
    {
        return view('pages/about');
    }

    public function future_career()
    {
        return view('pages/future-career');
    }

    public function academyGallery()
    {
        return view('pages/academyGallery');
    }

    public function admissionGuide()
    {
        return view('pages/admissionGuide');
    }

    public function becomeTeacher()
    {
        return view('pages/becomeTeacher');
    }

    public function cart()
    {
        return view('pages/cart');
    }

    public function contact()
    {
        return view('pages/contact');
    }

    public function admission()
    {
        $courses = Course::with(['university', 'instructor'])->latest()->paginate(9);
        return view('pages/services/admission', compact('courses'));
    }
    public function scholarship()
    {
        $courses = Course::with(['university', 'instructor'])->latest()->paginate(9);
        return view('pages/services/scholarship', compact('courses'));
    }
    public function visaGuidance()
    {
        $courses = Course::with(['university', 'instructor'])->latest()->paginate(9);
        return view('pages/services/visa-guidance', compact('courses'));
    }
    public function departureGuidance()
    {
        $courses = Course::with(['university', 'instructor'])->latest()->paginate(9);
        return view('pages/services/departure-guidance', compact('courses'));
    }
    public function ieltsRegistration()
    {
        $courses = Course::with(['university', 'instructor'])->latest()->paginate(9);
        return view('pages/services/ielts-registration', compact('courses'));
    }

    public function careerCounsel()
    {
        $courses = Course::with(['university', 'instructor'])->latest()->paginate(9);
        return view('pages/services/career-counsel', compact('courses'));
    }

    public function event()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(6);
        return view('pages/resources/event', compact('events'));
    }

    public function eventDetails($blog = null)
    {
         // If no blog param provided, show listing or redirect to a safe page
        if (is_null($blog)) {
            return redirect()->route('blog');
        }

        // Allow slug or id
        $model = null;
        if (is_numeric($blog)) {
            $model = \App\Models\Blog::find($blog);
        } else {
            $model = \App\Models\Blog::where('slug', $blog)->first();
        }

        if (!$model) {
            abort(404);
        }

        // Get related blogs (same category, excluding current blog)
        $relatedBlogs = \App\Models\Blog::where('category', $model->category)
            ->where('id', '!=', $model->id)
            ->where('is_published', true)
            ->latest()
            ->limit(3)
            ->get();

        return view('blog/blogDetails', [
            'blog' => $model,
            'relatedBlogs' => $relatedBlogs,
        ]);
    }

    public function blog()
    {
        return view('pages/resources/blog');
    }
    public function topUniversity()
    {
        $universities = University::with('country')->orderBy('created_at', 'desc')->paginate(9);
        return view('pages/resources/top-university', compact('universities'));
    }

    public function popularSubject()
    {
        $subjects = Subject::orderBy('created_at', 'desc')->paginate(9);
        return view('pages/resources/popular-subject', compact('subjects'));
    }

    public function studentEssential()
    {
        return view('pages/resources/student-essential');
    }

    public function termsService()
    {
        return view('pages/terms-service');
    }
    public function privacyPolicy()
    {
        return view('pages/privacy-policy');
    }
    public function faq()
    {
        return view('pages/faq');
    }

    public function bookAppointment()
    {
        return view('pages/book-appointment');
    }

    public function storeAppointment(Request $request)
    {
        $request->validate([
            'con_name' => 'required|string|max:255',
            'con_lastname' => 'required|string|max:255',
            'con_username' => 'required|email|max:255',
            'con_phone' => 'required|string|max:255',
            'option' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'message' => 'nullable|string',
        ]);

        Appointment::create([
            'first_name' => $request->con_name,
            'last_name' => $request->con_lastname,
            'email' => $request->con_username,
            'phone' => $request->con_phone,
            'country' => $request->option,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'message' => $request->message,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Appointment booked successfully!'
            ]);
        }

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }

    public function storeAssessment(Request $request)
    {
        $request->validate([
            'con_name' => 'required|string|max:255',
            'con_lastname' => 'required|string|max:255',
            'con_username' => 'required|email|max:255',
            'con_phone' => 'required|string|max:255',
            'option' => 'required|string|max:255',
            'assessment_date' => 'required|date',
            'assessment_time' => 'required|date_format:H:i',
            'message' => 'nullable|string',
        ]);

        Assessment::create([
            'first_name' => $request->con_name,
            'last_name' => $request->con_lastname,
            'email' => $request->con_username,
            'phone' => $request->con_phone,
            'country' => $request->option,
            'assessment_date' => $request->assessment_date,
            'assessment_time' => $request->assessment_time,
            'message' => $request->message,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Assessment booked successfully!'
            ]);
        }

        return redirect()->back()->with('success', 'Assessment booked successfully!');
    }

    public function storeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing to our newsletter!'
            ]);
        }

        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }

    public function takeAssessment()
    {
        return view('pages/take-assessment');
    }


    public function home()
    {
         // load courses with relations used in the view
        $courses = Course::with(['instructor', 'university'])
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // load testimonials for the testimonial section
        $testimonials = \App\Models\Testimonial::orderBy('created_at', 'desc')->limit(3)->get();

        // load blogs for the latest news section
        $blogs = \App\Models\Blog::orderBy('created_at', 'desc')->limit(4)->get();
        //return $blogs;

        // load success deliveries for counters
        $successDeliveries = \App\Models\SuccessDelivery::all();

        // load universities for EXPLORE TOP UNIVERSITIES section with pagination
        $universities = University::with('country')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        // load subjects for popular faculties section
        $subjects = Subject::orderBy('created_at', 'desc')->limit(4)->get();

        return view('pages/marketplace', compact('courses', 'testimonials', 'blogs', 'successDeliveries', 'universities', 'subjects'));
        //return view('pages/marketplace');
    }

    // public function eventDetails()
    // {
    //     return view('pages/eventDetails');
    // }

    public function eventGrid()
    {
        return view('pages/eventGrid');
    }

    public function eventList()
    {
        return view('pages/eventList');
    }

    public function eventSidebar()
    {
        return view('pages/eventSidebar');
    }

    public function faqs()
    {
        return view('pages/faqs');
    }

    public function instructor()
    {
        return view('pages/instructor');
    }

    public function login()
    {
        return view('pages/login');
    }

    public function maintenance()
    {
        return view('pages/maintenance');
    }

    public function myAccount()
    {
        return view('pages/myAccount');
    }

    // public function privacyPolicy()
    // {
    //     return view('pages/privacyPolicy');
    // }

    public function profile()
    {
        return view('pages/profile');
    }

    public function shop()
    {
        return view('pages/shop');
    }

    public function singleProduct()
    {
        return view('pages/singleProduct');
    }

    public function subscription()
    {
        return view('pages/subscription');
    }

    public function wishlist2()
    {
        return view('pages/wishlist2');
    }



}
