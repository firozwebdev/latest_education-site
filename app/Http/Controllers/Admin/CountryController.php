<?php
namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->search($request);
        }
        
        $countries = Country::latest()->paginate(15);
        return view('admin.countries.index', compact('countries'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search', '');
        
        $countries = Country::when($query, function ($q) use ($query) {
            return $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('code', 'LIKE', "%{$query}%")
                    ->orWhere('currency', 'LIKE', "%{$query}%")
                    ->orWhere('currency_symbol', 'LIKE', "%{$query}%");
        })->latest()->paginate(15);
        
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.countries.partials.table-rows', compact('countries'))->render(),
                'pagination' => $countries->appends(['search' => $query])->links('vendor.pagination.admin')->render()
            ]);
        }
        
        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:countries,code',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'currency' => 'nullable|string|size:3',
            'currency_symbol' => 'nullable|string|max:10',
        ]);

        $data = $request->only(['name', 'code', 'currency', 'currency_symbol']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('countries', 'public');
        }

        Country::create($data);
        return redirect()->route('admin.countries.index')->with('success', 'Country created successfully.');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string|unique:countries,code,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'currency' => 'nullable|string|size:3',
            'currency_symbol' => 'nullable|string|max:10',
        ]);

        $data = $request->only(['name', 'code', 'currency', 'currency_symbol']);

        if ($request->hasFile('image')) {
            if ($country->image && file_exists(public_path('storage/' . $country->image))) {
                unlink(public_path('storage/' . $country->image));
            }
            $data['image'] = $request->file('image')->store('countries', 'public');
        }

        $country->update($data);
        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully.');
    }
}
