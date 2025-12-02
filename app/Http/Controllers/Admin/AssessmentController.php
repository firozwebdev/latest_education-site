<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $assessments = Assessment::latest()->paginate(15);
        return view('admin.assessments.index', compact('assessments'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $assessments = Assessment::when($query, function ($q) use ($query) {
            return $q->where('first_name', 'LIKE', "%{$query}%")
                    ->orWhere('last_name', 'LIKE', "%{$query}%")
                    ->orWhere('email', 'LIKE', "%{$query}%")
                    ->orWhere('phone', 'LIKE', "%{$query}%")
                    ->orWhere('country', 'LIKE', "%{$query}%")
                    ->orWhere('message', 'LIKE', "%{$query}%");
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.assessments.partials.table-rows', compact('assessments'))->render(),
                'pagination' => $assessments->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.assessments.index', compact('assessments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        return view('admin.assessments.show', compact('assessment'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment)
    {
        $assessment->delete();

        return redirect()->route('admin.assessments.index')->with('success', 'Assessment deleted successfully.');
    }
}