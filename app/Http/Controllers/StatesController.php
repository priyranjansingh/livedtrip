<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class StatesController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $states = State::all();
        $states=DB::table('states')
            ->join('countries', 'states.country_id', '=', 'countries.id')
            ->select('states.id', 'states.state_name', 'countries.country_name')
            ->get();
        return view('states.index')->with('states', $states);

    }

    public function show($id) {
        $state = State::findOrFail($id);
        return view('states.show', compact('state'));
    }

    public function create() {
        
        $countries = Country::lists('country_name', 'id');
        return view('states.create',compact('countries'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'state_name' => 'required',
        ]);

        $input = $request->all();
        State::create($input);
        return redirect('state');
    }

    public function destroy($id) {
        $state = State::find($id);
        $state->delete();
        return redirect('state');
    }

    public function edit($id) {
        $state = State::findOrFail($id);
        $countries = Country::lists('country_name', 'id');
        
        return view('states.edit', compact('state','countries'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'state_name' => 'required',
        ]);
        $input =   $request->all();
        $state = State::findOrFail($id);
        $state->update($input);
        return redirect('state');
    }

    //
}
