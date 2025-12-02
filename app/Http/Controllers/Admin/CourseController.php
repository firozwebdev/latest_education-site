<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $courses = Course::with(['university', 'instructor'])->latest()->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $courses = Course::with(['university', 'instructor'])->when($query, function ($q) use ($query) {
            return $q->where('course_name', 'LIKE', "%{$query}%")
                    ->orWhere('city', 'LIKE', "%{$query}%")
                    ->orWhere('qs_ranking', 'LIKE', "%{$query}%")
                    ->orWhere('student_level', 'LIKE', "%{$query}%")
                    ->orWhere('language', 'LIKE', "%{$query}%")
                    ->orWhereHas('university', function($uq) use ($query) {
                        $uq->where('university_name', 'LIKE', "%{$query}%");
                    });
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.courses.partials.table-rows', compact('courses'))->render(),
                'pagination' => $courses->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $universities = \App\Models\University::all();
    $subjects = \App\Models\Subject::all();
    return view('admin.courses.create', compact('universities', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image',
            'images' => 'nullable|image',
            'university_id' => 'required|exists:universities,id',
            'subject_id' => 'required|exists:subjects,id',
            'offer_card_1' => 'required|string',
            'offer_card_2' => 'required|string',
            'city' => 'required|string',
            'qs_ranking' => 'required|string',
            'course_name' => 'required|string',
            'progress_to' => 'required|string',
            'student_level' => 'required|string',
            'study_level' => 'nullable|string',
            'duration' => 'nullable|string',
            'course_type' => 'nullable|string',
            'next_intake' => 'required|string',
            'entry_score' => 'required|string',
            'tuition_fees' => 'required|string',
        ]);

        $data = $request->all();

        // Generate slug from course name
        $data['slug'] = \Illuminate\Support\Str::slug($request->course_name);
        
        // Ensure slug is unique
        $originalSlug = $data['slug'];
        $counter = 1;
        while (Course::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Helpers\ImageHelper::saveImage($request->file('logo'), 'courses');
        }
        if ($request->hasFile('images')) {
            $data['images'] = \App\Helpers\ImageHelper::saveImage($request->file('images'), 'courses');
        }

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $course = Course::findOrFail($id);
    $universities = \App\Models\University::all();
    $subjects = \App\Models\Subject::all();
    return view('admin.courses.edit', compact('course', 'universities', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info('=== Course Update Started ===', [
            'method' => $request->method(),
            'url' => $request->fullUrl()
        ]);

        try {
            // Validate all fields except images (we handle images separately)
            $request->validate([
                'university_id' => 'required|exists:universities,id',
                'subject_id' => 'required|exists:subjects,id',
                'offer_card_1' => 'required|string',
                'offer_card_2' => 'required|string',
                'city' => 'required|string',
                'qs_ranking' => 'required|string',
                'course_name' => 'required|string',
                'progress_to' => 'required|string',
                'student_level' => 'required|string',
                'study_level' => 'nullable|string',
                'duration' => 'nullable|string',
                'course_type' => 'nullable|string',
                'next_intake' => 'required|string',
                'entry_score' => 'required|string',
                'tuition_fees' => 'required|string',
            ]);

            // Validate images only if they are actually uploaded
            $imageValidation = [];
            if ($request->hasFile('logo')) {
                $imageValidation['logo'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'; // 5MB
            }
            if ($request->hasFile('images')) {
                $imageValidation['images'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'; // 5MB
            }

            if (!empty($imageValidation)) {
                $request->validate($imageValidation);
            }

            Log::info('Validation passed');

            $course = Course::findOrFail($id);
            $data = $request->all();
            
            // Generate slug from course name if course name changed
            if ($request->course_name !== $course->course_name) {
                $data['slug'] = \Illuminate\Support\Str::slug($request->course_name);
                
                // Ensure slug is unique (excluding current course)
                $originalSlug = $data['slug'];
                $counter = 1;
                while (Course::where('slug', $data['slug'])->where('id', '!=', $id)->exists()) {
                    $data['slug'] = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }

        // // Debug logging
        // Log::info('=== Course Update Debug ===');
        // Log::info('Request all data:', $request->all());
        // Log::info('Request files:', ['files' => $request->allFiles()]);
        // Log::info('File detection:', [
        //     'has_logo_file' => $request->hasFile('logo'),
        //     'has_images_file' => $request->hasFile('images')
        // ]);

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            // Log::info('Logo file object:', [
            //     'original_name' => $logoFile ? $logoFile->getClientOriginalName() : 'null',
            //     'is_valid' => $logoFile ? $logoFile->isValid() : 'null',
            //     'size' => $logoFile ? $logoFile->getSize() : 'null',
            //     'error' => $logoFile ? $logoFile->getError() : 'null'
            // ]);
        }

        if ($request->hasFile('images')) {
            $imagesFile = $request->file('images');
            // Log::info('Images file object:', [
            //     'original_name' => $imagesFile ? $imagesFile->getClientOriginalName() : 'null',
            //     'is_valid' => $imagesFile ? $imagesFile->isValid() : 'null',
            //     'size' => $imagesFile ? $imagesFile->getSize() : 'null',
            //     'error' => $imagesFile ? $imagesFile->getError() : 'null'
            // ]);
        }

        // Handle logo upload - check if it's actually a file upload, not just a string value
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            if ($logoFile && $logoFile->isValid()) {
                $data['logo'] = \App\Helpers\ImageHelper::updateImage($logoFile, $course->logo, 'courses');
                Log::info('Logo updated to:', ['path' => $data['logo']]);
            } else {
                unset($data['logo']);
                // Log::info('Logo not updated - file invalid or null');
            }
        } else {
            // Remove logo from data to prevent overwriting with form string value
            unset($data['logo']);
            // Log::info('Logo not updated - no file uploaded');
        }

        // Handle images upload - check if it's actually a file upload, not just a string value
        if ($request->hasFile('images')) {
            $imagesFile = $request->file('images');
            if ($imagesFile && $imagesFile->isValid()) {
                $data['images'] = \App\Helpers\ImageHelper::updateImage($imagesFile, $course->images, 'courses');
                // Log::info('Images updated to:', ['path' => $data['images']]);
            } else {
                unset($data['images']);
                // Log::info('Images not updated - file invalid or null');
            }
        } else {
            // Remove images from data to prevent overwriting with form string value
            unset($data['images']);
            // Log::info('Images not updated - no file uploaded');
        }

        // Log::info('Final update data:', $data);
        // Log::info('=== End Course Update Debug ===');

        $course->update($data);

        // Log::info('Course update completed successfully');
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log::error('Validation failed:', $e->errors());
            throw $e;
        } catch (\Exception $e) {
            // Log::error('Course update failed:', [
            //     'error' => $e->getMessage(),
            //     'trace' => $e->getTraceAsString()
            // ]);
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
