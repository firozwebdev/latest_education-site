<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function courseCard2()
    {
        return view('courses/courseCard2');
    }

    public function courseCard3()
    {
        return view('courses/courseCard3');
    }

    public function courseDetails()
    {
        return view('courses/courseDetails');
    }

    public function courseDetails2()
    {
        // placeholder: overridden by route parameter in updated route
        return redirect()->route('courseCard2');
    }

    public function courseDetails2_show($course = null)
    {
        // If no course param provided, show listing or redirect to a safe page
        if (is_null($course)) {
            return redirect()->route('courseCard2');
        }
        // allow slug or id
        $model = null;
        if (is_numeric($course)) {
            $model = \App\Models\Course::with(['university','instructor','subject'])->find($course);
        } else {
            $model = \App\Models\Course::with(['university','instructor','subject'])->where('slug', $course)->first();
        }

        if (! $model) {
            abort(404);
        }

        // related courses (all courses except current one with pagination)
        $relatedCourses = \App\Models\Course::with(['university', 'instructor'])
            ->where('id', '!=', $model->id)
            ->latest()
            ->paginate(9);

        // testimonials (take some random testimonials)
        $testimonials = \App\Models\Testimonial::inRandomOrder()->limit(6)->get();
        

        return view('pages/courseDetails2', [
            'course' => $model,
            'relatedCourses' => $relatedCourses,
            'testimonials' => $testimonials,
        ]);
    }

    public function courseDetails3()
    {
        return view('courses/courseDetails3');
    }

    public function courseFilterOneOpen(Request $request)
    {
        $query = \App\Models\Course::with(['university.country', 'instructor', 'subject']);

        // Enhanced Search - search in course name, description, university name, and subject name
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('course_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('university', function($subQ) use ($searchTerm) {
                      $subQ->where('university_name', 'like', '%' . $searchTerm . '%');
                  })
                  ->orWhereHas('subject', function($subQ) use ($searchTerm) {
                      $subQ->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        // Filter by Subject
        if ($request->filled('subject')) {
            $query->whereHas('subject', function($q) use ($request) {
                $q->where('name', $request->subject);
            });
        }

        // Filter by Study Level
        if ($request->filled('study_level')) {
            $query->where('study_level', $request->study_level);
        }

        // Filter by Country
        if ($request->filled('country')) {
            $query->whereHas('university', function($q) use ($request) {
                $q->where('country_id', $request->country);
            });
        }

        // Filter by University
        if ($request->filled('university')) {
            $query->where('university_id', $request->university);
        }



        // Sort By
        $sort = $request->get('sort', 'default');
        switch ($sort) {
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popularity':
                $query->orderBy('enrolled', 'desc');
                break;
            case 'trending':
                $query->orderBy('rating', 'desc');
                break;
            case 'price_low':
                $query->orderBy('tuition_fees', 'asc');
                break;
            case 'price_high':
                $query->orderBy('tuition_fees', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $courses = $query->paginate(12);

        // Load filter data - optimize by only loading what's needed
        $subjects = \App\Models\Subject::orderBy('name')->get();
        $countries = \App\Models\Country::orderBy('name')->get();
        $universities = \App\Models\University::orderBy('university_name')->get();

        return view('courses/courseFilterOneOpen', compact('courses', 'subjects', 'countries', 'universities'));
    }

    public function courseFilterOneToggle(Request $request)
    {
        $query = \App\Models\Course::with(['university.country', 'instructor', 'subject']);
        $country = null;
        
        if ($request->has('country')) {
            $country = \App\Models\Country::find($request->country);
            $query->whereHas('university', function($q) use ($request) {
                $q->where('country_id', $request->country);
            });
        }
        
        $courses = $query->orderBy('created_at', 'desc')->paginate(12);
        return view('pages/courseFilterOneToggle', compact('courses', 'country'));
    }

    public function courseFilterTwoOpen()
    {
        return view('courses/courseFilterTwoOpen');
    }

    public function courseFilterTwoToggle()
    {
        return view('courses/courseFilterTwoToggle');
    }

    public function courseMasonry()
    {
        return view('courses/courseMasonry');
    }

    public function courseWithSidebar()
    {
        return view('courses/courseWithSidebar');
    }

    public function courseWithTab()
    {
        return view('courses/courseWithTab');
    }

    public function courseWithTabTwo()
    {
        return view('courses/courseWithTabTwo');
    }

    public function createCourse()
    {
        return view('courses/createCourse');
    }

    public function instructorCourse()
    {
        return view('courses/instructorCourse');
    }

    public function lesson()
    {
        return view('courses/lesson');
    }

    public function countryUniversities($country)
    {
        $countryModel = \App\Models\Country::findOrFail($country);
        $universities = \App\Models\University::where('country_id', $country)
            ->withCount('courses')
            ->orderBy('university_name')
            ->paginate(12);
        
        return view('pages/countryUniversities', compact('countryModel', 'universities'));
    }

    public function universityCourses($university)
    {
        $universityModel = \App\Models\University::with('country')->findOrFail($university);
        $courses = \App\Models\Course::with(['university.country', 'instructor', 'subject'])
            ->where('university_id', $university)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        return view('pages/universityCourses', compact('universityModel', 'courses'));
    }

}
