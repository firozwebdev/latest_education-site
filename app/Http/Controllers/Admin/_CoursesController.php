<?php
namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('university')->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $universities = University::all();
        return view('admin.courses.create', compact('universities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string',
            'university_id' => 'required|exists:universities,id',
            'logo' => 'nullable|image',
            'images' => 'nullable|image',
            'offer_card_1' => 'required|string',
            'offer_card_2' => 'required|string',
            'city' => 'required|string',
            'qs_ranking' => 'required|string',
            'progress_to' => 'required|string',
            'student_level' => 'required|string',
            'next_intake' => 'required|string',
            'entry_score' => 'required|string',
            'tuition_fees' => 'required|string',
        ]);
       
        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Helpers\ImageHelper::saveImage($request->file('logo'), 'courses');
        }
        if ($request->hasFile('images')) {
            $data['images'] = \App\Helpers\ImageHelper::saveImage($request->file('images'), 'courses');
        }
        Course::create($data);
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $universities = University::all();
        return view('admin.courses.edit', compact('course', 'universities'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'course_name' => 'required|string',
            'university_id' => 'required|exists:universities,id',
            'logo' => 'nullable|image',
            'images' => 'nullable|image',
            'offer_card_1' => 'required|string',
            'offer_card_2' => 'required|string',
            'city' => 'required|string',
            'qs_ranking' => 'required|string',
            'progress_to' => 'required|string',
            'student_level' => 'required|string',
            'next_intake' => 'required|string',
            'entry_score' => 'required|string',
            'tuition_fees' => 'required|string',
        ]);
        $data = $request->all();
        return $data;
        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Helpers\ImageHelper::updateImage($request->file('logo'), $course->logo, 'courses');
        }
        if ($request->hasFile('images')) {
            $data['images'] = \App\Helpers\ImageHelper::updateImage($request->file('images'), $course->images, 'courses');
        }
        $course->update($data);
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
