<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $universities = University::latest()->paginate(15);
        return view('admin.universities.index', compact('universities'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $universities = University::when($query, function ($q) use ($query) {
            return $q->where('university_name', 'LIKE', "%{$query}%")
                    ->orWhere('location', 'LIKE', "%{$query}%")
                    ->orWhere('student_level', 'LIKE', "%{$query}%")
                    ->orWhere('scholarship', 'LIKE', "%{$query}%");
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.universities.partials.table-rows', compact('universities'))->render(),
                'pagination' => $universities->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.universities.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $countries = \App\Models\Country::all();
    return view('admin.universities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'university_name' => 'required|string',
            'student_level' => 'required|string',
            'duration' => 'required|string',
            'next_intake' => 'required|string',
            'tuition_fees' => 'required|numeric',
            'scholarship' => 'required|string',
            'ielts_score' => 'required|string',
            'website_url' => 'required|url',
            'description' => 'required|string',
            'global_rank' => 'required|integer',
            'in_country_rank' => 'required|integer',
            'location' => 'required|string',
            'logo' => 'nullable|image',
            'university_image' => 'nullable|image',
            'university_wise_course' => 'required|string',
        ]);

        $data = $request->only([
            'country_id',
            'university_name',
            'student_level',
            'duration',
            'next_intake',
            'tuition_fees',
            'scholarship',
            'ielts_score',
            'website_url',
            'description',
            'global_rank',
            'in_country_rank',
            'location',
            'university_wise_course',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Helpers\ImageHelper::saveImage($request->file('logo'), 'universities');
        }
        if ($request->hasFile('university_image')) {
            $data['university_image'] = \App\Helpers\ImageHelper::saveImage($request->file('university_image'), 'universities');
        }
        University::create($data);

        return redirect()->route('admin.universities.index')->with('success', 'University created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $university = University::findOrFail($id);
        return view('admin.universities.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $university = University::findOrFail($id);
    $countries = \App\Models\Country::all();
    return view('admin.universities.edit', compact('university', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        \Log::info('University update started', ['request' => $request->all()]);

        try {
            $request->validate([
                'country_id' => 'required|exists:countries,id',
                'university_name' => 'required|string|max:255',
                'student_level' => 'required|string|max:255',
                'duration' => 'required|string|max:255',
                'next_intake' => 'required|string|max:255',
                'tuition_fees' => 'required|numeric|min:0',
                'scholarship' => 'required|string|max:255',
                'ielts_score' => 'required|string|max:255',
                'website_url' => 'required|url|max:500',
                'description' => 'required|string',
                'global_rank' => 'required|integer|min:1',
                'in_country_rank' => 'required|integer|min:1',
                'location' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'university_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'university_wise_course' => 'required|string',
            ]);

            $university = University::findOrFail($id);
            \Log::info('University found', ['university' => $university->toArray()]);

            // Get only the fields we want to update
            $data = $request->only([
                'country_id',
                'university_name',
                'student_level',
                'duration',
                'next_intake',
                'tuition_fees',
                'scholarship',
                'ielts_score',
                'website_url',
                'description',
                'global_rank',
                'in_country_rank',
                'location',
                'university_wise_course',
            ]);

            \Log::info('Data before logo handling', ['data' => $data, 'hasFile' => $request->hasFile('logo'), 'file' => $request->file('logo')]);

            // Handle logo upload
            if ($request->hasFile('logo')) {
                \Log::info('Logo file detected');
                // Delete old logo if exists
                if ($university->logo && file_exists(public_path($university->logo))) {
                    \Log::info('Deleting old logo', ['old_logo' => $university->logo]);
                    unlink(public_path($university->logo));
                }
                $data['logo'] = \App\Helpers\ImageHelper::saveImage($request->file('logo'), 'universities');
                \Log::info('New logo saved', ['new_logo' => $data['logo']]);
            } else {
                \Log::info('No logo file uploaded');
            }

            // Handle university_image upload
            if ($request->hasFile('university_image')) {
                \Log::info('University image file detected');
                // Delete old university_image if exists
                if ($university->university_image && file_exists(public_path($university->university_image))) {
                    \Log::info('Deleting old university image', ['old_image' => $university->university_image]);
                    unlink(public_path($university->university_image));
                }
                $data['university_image'] = \App\Helpers\ImageHelper::saveImage($request->file('university_image'), 'universities');
                \Log::info('New university image saved', ['new_image' => $data['university_image']]);
            } else {
                \Log::info('No university image file uploaded');
            }
            // If no new logo uploaded, don't include logo in data array to avoid overwriting with null

            \Log::info('Final data for update', ['data' => $data]);

            // Update the university
            $result = $university->update($data);
            \Log::info('University update result', ['result' => $result, 'updated_university' => $university->fresh()->toArray()]);

        } catch (\Exception $e) {
            \Log::error('University update failed', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw $e;
        }

        return redirect()->route('admin.universities.index')->with('success', 'University updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $university = University::findOrFail($id);
        $university->delete();

        return redirect()->route('admin.universities.index')->with('success', 'University deleted successfully.');
    }
}
