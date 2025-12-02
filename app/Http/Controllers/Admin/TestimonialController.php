<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $testimonials = Testimonial::with('university')->when($query, function ($q) use ($query) {
            return $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('degree_name', 'LIKE', "%{$query}%")
                    ->orWhere('review', 'LIKE', "%{$query}%")
                    ->orWhereHas('university', function($uq) use ($query) {
                        $uq->where('university_name', 'LIKE', "%{$query}%");
                    });
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.testimonials.partials.table-rows', compact('testimonials'))->render(),
                'pagination' => $testimonials->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities = \App\Models\University::all();
        return view('admin.testimonials.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string',
            'description' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|image',
            'degree_name' => 'required|string',
            'university_id' => 'required|exists:universities,id',
        ]);

        $data = $request->only([
            'review',
            'description',
            'name',
            'degree_name',
            'university_id',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\ImageHelper::saveImage($request->file('image'), 'testimonials');
        }
        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $universities = \App\Models\University::all();
        return view('admin.testimonials.edit', compact('testimonial', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'review' => 'required|string',
            'description' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|image',
            'degree_name' => 'required|string',
            'university_id' => 'required|exists:universities,id',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $data = $request->only([
            'review',
            'description',
            'name',
            'degree_name',
            'university_id',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\ImageHelper::updateImage($request->file('image'), $testimonial->image, 'testimonials');
        }
        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
