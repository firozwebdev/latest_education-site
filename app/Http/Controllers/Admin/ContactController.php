<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $contacts = Contact::when($query, function ($q) use ($query) {
            return $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('email', 'LIKE', "%{$query}%")
                    ->orWhere('subject', 'LIKE', "%{$query}%")
                    ->orWhere('message', 'LIKE', "%{$query}%");
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.contacts.partials.table-rows', compact('contacts'))->render(),
                'pagination' => $contacts->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }
}