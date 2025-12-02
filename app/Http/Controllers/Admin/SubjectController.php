<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $subjects = Subject::latest()->paginate(15);
        return view('admin.subjects.index', compact('subjects'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $subjects = Subject::when($query, function ($q) use ($query) {
            return $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.subjects.partials.table-rows', compact('subjects'))->render(),
                'pagination' => $subjects->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\ImageHelper::saveImage($request->file('image'), 'subjects');
        }
        Subject::create($data);
        return redirect()->route('admin.subjects.index')->with('success', 'Subject created successfully.');
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        $subject = Subject::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = \App\Helpers\ImageHelper::updateImage($request->file('image'), $subject->image, 'subjects');
        }
        $subject->update($data);
        return redirect()->route('admin.subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('admin.subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
