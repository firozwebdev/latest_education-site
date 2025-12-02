<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $branches = Branch::latest()->paginate(15);
        return view('admin.branches.index', compact('branches'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $branches = Branch::with('country')->when($query, function ($q) use ($query) {
            return $q->where('branch_name', 'LIKE', "%{$query}%")
                    ->orWhere('branch_location', 'LIKE', "%{$query}%")
                    ->orWhere('phone', 'LIKE', "%{$query}%")
                    ->orWhere('email', 'LIKE', "%{$query}%")
                    ->orWhereHas('country', function($cq) use ($query) {
                        $cq->where('name', 'LIKE', "%{$query}%");
                    });
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.branches.partials.table-rows', compact('branches'))->render(),
                'pagination' => $branches->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = \App\Models\Country::all();
        return view('admin.branches.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required|string',
            'branch_location' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'country_id' => 'required|exists:countries,id',
            'map_images' => 'nullable|string',
        ]);

        $data = $request->only([
            'branch_name',
            'branch_location',
            'phone',
            'email',
            'country_id',
            'map_images',
        ]);

        Branch::create($data);

        return redirect()->route('admin.branches.index')->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::findOrFail($id);
        $countries = \App\Models\Country::all();
        return view('admin.branches.edit', compact('branch', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'branch_name' => 'required|string',
            'branch_location' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'country_id' => 'required|exists:countries,id',
            'map_images' => 'nullable|string',
        ]);

        $branch = Branch::findOrFail($id);
        $data = $request->only([
            'branch_name',
            'branch_location',
            'phone',
            'email',
            'country_id',
            'map_images',
        ]);

        $branch->update($data);

        return redirect()->route('admin.branches.index')->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();

        return redirect()->route('admin.branches.index')->with('success', 'Branch deleted successfully.');
    }
}
