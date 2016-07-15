<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class CitiesController extends Controller {

    public function index() {
        $cities = DB::table('cities')
                ->join('countries', 'cities.country_id', '=', 'countries.id')
                ->join('states', 'cities.state_id', '=', 'states.id')
                ->select('cities.id', 'cities.city_name', 'states.state_name', 'countries.country_name')
                ->get();
        return view('cities.index')->with('cities', $cities);
    }

    public function show($id) {
        $state = State::findOrFail($id);
        return view('states.show', compact('state'));
    }

    public function create() {
        $country_arr = array('' => 'Select Country');
        $countries = Country::lists('country_name', 'id');
        foreach ($countries as $key => $val) {
            $country_arr[$key] = $val;
        }
        $states = array();
        return view('cities.create', compact('country_arr', 'states'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'city_name' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);

        $input = $request->all();
        City::create($input);
        return redirect('city');
    }

    public function destroy($id) {
        $city = City::find($id);
        $city->delete();
        return redirect('city');
    }

    public function edit($id) {
        $city = City::findOrFail($id);
        $states = State::where('country_id', $city->country_id)->lists('state_name', 'id');
        $countries = Country::lists('country_name', 'id');
        return view('cities.edit', compact('city','states','countries'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'city_name' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);
        $input = $request->all();
        $city = City::findOrFail($id);
        $city->update($input);
        return redirect('city');
    }

    public function getState($id) {
        $states_arr = array('' => 'Select State');
        $states = State::where('country_id', $id)->lists('state_name', 'id');
        ?>
        <option value=''>Select State</option>
        <?php
        foreach ($states as $key => $val) {
            ?>
            <option value='<?php echo $key; ?>'><?php echo $val ?></option>
            <?php
        }
    }

}
