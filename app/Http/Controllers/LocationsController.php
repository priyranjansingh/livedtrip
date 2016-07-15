<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Session;

class LocationsController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $locations = DB::table('locations')
                ->join('cities', 'locations.city_id', '=', 'cities.id')
                ->join('countries', 'locations.country_id', '=', 'countries.id')
                ->join('states', 'locations.state_id', '=', 'states.id')
                ->select('locations.id', 'locations.active', 'locations.location_name', 'cities.city_name', 'states.state_name', 'countries.country_name')
                ->get();
        return view('locations.index')->with('locations', $locations);
    }

    public function show($id) {
        $location = Location::findOrFail($id);
        return view('locations.show', compact('location'));
    }

    public function create() {
        $states_arr = array('' => 'Select State');
        if (Session::has('country_id')) {
            $country_id = Session::get('country_id');
            $states = State::where('country_id', $country_id)->lists('state_name', 'id');
            foreach ($states as $key => $val) {
                $states_arr[$key] = $val;
            }
        }
        
        $cities_arr = array('' => 'Select City');
        if (Session::has('state_id')) {
            $state_id = Session::get('state_id');
            $cities = City::where('state_id', $state_id)->lists('city_name', 'id');
            foreach ($cities as $key => $val) {
                $cities_arr[$key] = $val;
            }
        }
        
        $country_arr = array('' => 'Select Country');
        $countries = Country::lists('country_name', 'id');
        foreach ($countries as $key => $val) {
            $country_arr[$key] = $val;
        }
        $states = $states_arr;
        $cities = $cities_arr;
        return view('locations.create', compact('country_arr','states','cities'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                    'location_name' => 'required',
                    'city_id' => 'required',
                    'state_id' => 'required',
                    'country_id' => 'required',
                    'meta_title' => 'required',
                    'meta_desc' => 'required',
                    'metatag' => 'required',
                    'location_image' => 'required',
                    'destination_details' => 'required',
        ]);

        if ($validator->fails()) {
            $arr = array();
            $arr['country_id'] = $request->country_id;
            $arr['state_id'] = $request->state_id;
            return redirect('location/create')
                            ->withErrors($validator)
                            ->withInput()
                            ->with($arr);
        }
        $input = $request->all();
        if($request->hasFile('location_image')) {
            $file = Input::file('location_image');
            $name = $request->location_name.time() . '-' .$file->getClientOriginalName();
            $input['location_image'] = $name;
            $file->move(public_path().'/images/location_image/', $name);
        }
        Location::create($input);
        return redirect('location');
    }

    public function destroy($id) {
        $location = Location::find($id);
        $location->delete();
        return redirect('location');
    }

    public function edit($id) {
        $location = Location::findOrFail($id);
        $states = State::where('country_id', $location->country_id)->lists('state_name', 'id');
        $cities = City::where('state_id', $location->state_id)->lists('city_name', 'id');
        $countries = Country::lists('country_name', 'id');
        return view('locations.edit', compact('location', 'cities', 'states', 'countries'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'location_name' => 'required',
            'city_id' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'metatag' => 'required',
            'destination_details' => 'required',
        ]);
        $input = $request->all();
        if($request->hasFile('location_image')) {
            $file = Input::file('location_image');
            $name = $request->location_image.time() . '-' .$file->getClientOriginalName();
            $input['location_image'] = $name;
            $file->move(public_path().'/images/location_image/', $name);
        }
        $location = Location::findOrFail($id);
        $location->update($input);
        return redirect('location');
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
    
    public function getCity($id) {
        $cities_arr = array('' => 'Select City');
        $cities = City::where('state_id', $id)->lists('city_name', 'id');
        ?>
        <option value=''>Select City</option>
        <?php
        foreach ($cities as $key => $val) {
            ?>
            <option value='<?php echo $key; ?>'><?php echo $val ?></option>
            <?php
        }
    }

    public function changeStat($id) {
        $package = Location::findOrFail($id);
        if($package->active =='Y')
        {
            $package->active = 'N';
        } 
        else
        {
            $package->active = 'Y';
        }   
        
        $package->save();
        
    }
    

}
