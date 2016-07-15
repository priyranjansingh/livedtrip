<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Location;
use App\Models\Hotel;
use App\Models\Package_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Session;

class PackagedetailController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index($id) {
        $package_id = $id;
        $existing_packages = DB::table('package_details')
                ->where('package_details.package_id',$package_id)
                ->join('cities', 'package_details.city_id', '=', 'cities.id')
                ->join('countries', 'package_details.country_id', '=', 'countries.id')
                ->join('states', 'package_details.state_id', '=', 'states.id')
                ->join('locations', 'package_details.location_id', '=', 'locations.id')
                ->join('hotels', 'package_details.hotel_id', '=', 'hotels.id')
                ->select('package_details.id','package_details.package_day','hotels.hotel_name', 'locations.location_name', 'cities.city_name', 'states.state_name', 'countries.country_name')
                ->get();
        $totalday = DB::table('packages')->where('packages.id',$package_id)->select('packages.totalday')->first();
        return view('packagedetail.index', compact('existing_packages', 'package_id', 'totalday'));
    }

    public function create($id) {
        
        $package_id = $id;
        
        // getting all the packages
        
        $existing_packages = DB::table('package_details')
                ->where('package_details.package_id',$package_id)
                ->join('cities', 'package_details.city_id', '=', 'cities.id')
                ->join('countries', 'package_details.country_id', '=', 'countries.id')
                ->join('states', 'package_details.state_id', '=', 'states.id')
                ->join('locations', 'package_details.location_id', '=', 'locations.id')
                ->join('hotels', 'package_details.hotel_id', '=', 'hotels.id')
                ->select('package_details.id','package_details.package_day','hotels.hotel_name', 'locations.location_name', 'cities.city_name', 'states.state_name', 'countries.country_name')
                ->get();
        $totalday = DB::table('packages')->where('packages.id',$package_id)->select('packages.totalday')->first();
       // end of getting the existing packages 
        
        
        
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
        
        $locations_arr = array('' => 'Select Location');
        if (Session::has('state_id')) {
            $city_id = Session::get('city_id');
            $locations = Location::where('city_id', $city_id)->lists('location_name', 'id');
            foreach ($locations as $key => $val) {
                $locations_arr[$key] = $val;
            }
        }
        
        
        $country_arr = array('0' => 'Select Country');
        $countries = Country::lists('country_name', 'id');
        foreach ($countries as $key => $val) {
            $country_arr[$key] = $val;
        }
        
        $hotel_arr = array('' => 'Select Hotel');
        if (Session::has('location_id')) {
            $city_id = Session::get('location_id');
            $hotels = Hotel::where('location_id', $city_id)->lists('location_name', 'id');
            foreach ($hotels as $key => $val) {
                $hotel_arr[$key] = $val;
            }
        }
        
        
        $states = $states_arr;
        $cities = $cities_arr;
        $locations = $locations_arr;
        return view('packagedetail.create', compact('country_arr','states','cities','locations','hotel_arr','package_id','existing_packages', 'totalday'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                    'package_day' => 'required',
                    'location_id' => 'required|not_in:0',
                    'city_id' => 'required|not_in:0',
                    'state_id' => 'required|not_in:0',
                    'country_id' => 'required|not_in:0',
                    'hotel_id' => 'required|not_in:0',
                    'night_stay' => 'required',
        ]);

        if ($validator->fails()) {
            $arr = array();
            $arr['country_id'] = $request->country_id;
            $arr['state_id'] = $request->state_id;
            $arr['city_id'] = $request->city_id;
            return redirect('packagedetail/create/'.$request->package_id)
                            ->withErrors($validator)
                            ->withInput()
                            ->with($arr);
        }
       $input = $request->all(); 
        $packagedetail_model = Package_detail::create($input);
        return redirect('packagedetail/create/'.$input['package_id']);
    }

    public function destroy($id) {
        $package_detail = Package_detail::find($id);
        $package_id = $package_detail->package_id;
        $package_detail->delete();
        return redirect('packagedetail/'.$package_id);
    }

    public function edit($id) {
        $package_detail = Package_detail::findOrFail($id);
        if (Session::has('country_id')) {
            $states_arr = array('' => 'Select State');
            $country_id = Session::get('country_id');
            $states = State::where('country_id', $country_id)->lists('state_name', 'id');
            foreach ($states as $key => $val) {
                $states_arr[$key] = $val;
            }
        
        }else{
            $states_arr = State::where('country_id', $package_detail->country_id)->lists('state_name', 'id');            
        }
        
        
        if (Session::has('state_id')) {
            $cities_arr = array('' => 'Select City');
            $state_id = Session::get('state_id');
            $cities = City::where('state_id', $state_id)->lists('city_name', 'id'); 
            foreach ($cities as $key => $val) {
                $cities_arr[$key] = $val;
            }
        }else{
            $cities_arr = City::where('state_id', $package_detail->state_id)->lists('city_name', 'id');
        }
        
        
        if (Session::has('state_id')) {
            $locations_arr = array('' => 'Select Location');
            $city_id = Session::get('city_id');
            $locations = Location::where('city_id', $city_id)->lists('location_name', 'id');
            foreach ($locations as $key => $val) {
                $locations_arr[$key] = $val;
            }
        }else{
            $locations_arr = Location::where('city_id', $package_detail->city_id)->lists('location_name', 'id');
        }
                
        $country_arr = Country::lists('country_name', 'id');        
        $hotel_arr = Hotel::lists('hotel_name', 'id');   
        $states = $states_arr;
        $cities = $cities_arr;
        $locations = $locations_arr;      
        return view('packagedetail.edit', compact('package_detail','country_arr','states','cities','locations','hotel_arr'));
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
                    'package_day' => 'required',
                    'location_id' => 'required|not_in:0',
                    'city_id' => 'required|not_in:0',
                    'state_id' => 'required|not_in:0',
                    'country_id' => 'required|not_in:0',
                    'hotel_id' => 'required|not_in:0',
                    'night_stay' => 'required',
        ]);

        if ($validator->fails()) {
            $arr = array();
            $arr['country_id'] = $request->country_id;
            $arr['state_id'] = $request->state_id;
            $arr['city_id'] = $request->city_id;
            return redirect('packagedetail/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput()
                            ->with($arr);
        }
       $input = $request->all(); 
       $package_id=$input['package_id'];
       $packagedetail = Package_detail::findOrFail($id);
       $packagedetail->update($input);
       return redirect('packagedetail/'.$package_id);
    }

    public function getState($id) {
        $states_arr = array('0' => 'Select State');
        $states = State::where('country_id', $id)->lists('state_name', 'id');
        ?>
        <option value='0'>Select State</option>
        <?php
        foreach ($states as $key => $val) {
            ?>
            <option value='<?php echo $key; ?>'><?php echo $val ?></option>
            <?php
        }
    }
    
    public function getCity($id) {
        $cities_arr = array('0' => 'Select City');
        $cities = City::where('state_id', $id)->lists('city_name', 'id');
        ?>
        <option value='0'>Select City</option>
        <?php
        foreach ($cities as $key => $val) {
            ?>
            <option value='<?php echo $key; ?>'><?php echo $val ?></option>
            <?php
        }
    }
    
    public function getLocation($id) {
        $locations_arr = array('0' => 'Select Location');
        $locations = Location::where('city_id', $id)->lists('location_name', 'id');
        ?>
        <option value='0'>Select Location</option>
        <?php
        foreach ($locations as $key => $val) {
            ?>
            <option value='<?php echo $key; ?>'><?php echo $val ?></option>
            <?php
        }
    }
    

}
