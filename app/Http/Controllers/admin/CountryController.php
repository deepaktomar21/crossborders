<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.index', compact('countries'));
    }


    public function create()
    {
        return view('admin.country.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:countries']);
        Country::create($request->all());
        return redirect()->route('countries.index')->with('success', 'Country added successfully!');
    }

    public function edit(Country $country)
    {
        return view('admin.country.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate(['name' => 'required|unique:countries,name,' . $country->id]);
        $country->update($request->all());
        return redirect()->route('countries.index')->with('success', 'Country updated successfully!');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('success', 'Country deleted successfully!');
    }
}
