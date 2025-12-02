<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $events = Event::latest()->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $events = Event::when($query, function ($q) use ($query) {
            return $q->where('event_name', 'LIKE', "%{$query}%")
                    ->orWhere('location_name', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")
                    ->orWhere('details_description', 'LIKE', "%{$query}%");
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.events.partials.table-rows', compact('events'))->render(),
                'pagination' => $events->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image',
            'content' => 'required|string',
            'event_name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location_name' => 'required|string',
            'details_description' => 'required|string',
            'single_page_view' => 'boolean',
        ]);

        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Helpers\ImageHelper::saveImage($request->file('logo'), 'events');
        }
        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => 'nullable|image',
            'content' => 'required|string',
            'event_name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location_name' => 'required|string',
            'details_description' => 'required|string',
            'single_page_view' => 'boolean',
        ]);

        $event = Event::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = \App\Helpers\ImageHelper::updateImage($request->file('logo'), $event->logo, 'events');
        }
        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
