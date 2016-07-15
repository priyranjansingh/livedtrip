<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountriesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $countries = Country::all();
        return view('countries.index')->with('countries', $countries);
        //or
        //return view('countries.index',compact('countries'));
    }

    public function show($id) {
        $country = Country::findOrFail($id);
        return view('countries.show', compact('country'));
    }

    public function create() {
        return view('countries.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'country_name' => 'required',
        ]);

        $input = $request->all();
        Country::create($input);
        return redirect('country');
    }

    public function destroy($id) {
        $country = Country::find($id);
        $country->delete();
        return redirect('country');
    }

    public function edit($id) {
        $country = Country::findOrFail($id);
        return view('countries.edit', compact('country'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'country_name' => 'required',
        ]);
        $input = $request->all();
        $country = Country::findOrFail($id);
        $country->update($input);
        return redirect('country');
    }

    //
}
