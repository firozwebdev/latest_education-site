<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessDelivery;
use Illuminate\Http\Request;

class SuccessDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $successDeliveries = SuccessDelivery::latest()->paginate(15);
        return view('admin.success-deliveries.index', compact('successDeliveries'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $successDeliveries = SuccessDelivery::when($query, function ($q) use ($query) {
            return $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('youtube_link', 'LIKE', "%{$query}%");
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.success-deliveries.partials.table-rows', compact('successDeliveries'))->render(),
                'pagination' => $successDeliveries->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.success-deliveries.index', compact('successDeliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.success-deliveries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'youtube_link' => 'nullable|url',
        ]);

        $data = $request->only([
            'name',
            'youtube_link',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('success_deliveries', 'public');
        }

        SuccessDelivery::create($data);

        return redirect()->route('admin.success-deliveries.index')->with('success', 'Success Delivery created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $successDelivery = SuccessDelivery::findOrFail($id);
        return view('admin.success-deliveries.show', compact('successDelivery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $successDelivery = SuccessDelivery::findOrFail($id);
        return view('admin.success-deliveries.edit', compact('successDelivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'youtube_link' => 'nullable|url',
        ]);

        $successDelivery = SuccessDelivery::findOrFail($id);
        $data = $request->only([
            'name',
            'youtube_link',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($successDelivery->image && file_exists(public_path($successDelivery->image))) {
                unlink(public_path($successDelivery->image));
            }

            // Save new image
            $data['image'] = $request->file('image')->store('success_deliveries', 'public');
        }

        $successDelivery->update($data);

        return redirect()->route('admin.success-deliveries.index')->with('success', 'Success Delivery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $successDelivery = SuccessDelivery::findOrFail($id);
        $successDelivery->delete();

        return redirect()->route('admin.success-deliveries.index')->with('success', 'Success Delivery deleted successfully.');
    }
}
