<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Location;
use App\Models\Hotel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Session;

class HotelsController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $hotels = DB::table('hotels')
                ->join('cities', 'hotels.city_id', '=', 'cities.id')
                ->join('countries', 'hotels.country_id', '=', 'countries.id')
                ->join('states', 'hotels.state_id', '=', 'states.id')
                //->join('locations', 'hotels.location_id', '=', 'locations.id')
                ->select('hotels.id','hotels.hotel_name', /*'locations.location_name',*/ 'cities.city_name', 'states.state_name', 'countries.country_name','hotels.active')
                ->get();
        return view('hotels.index')->with('hotels', $hotels);
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
        $states = $states_arr;
        $cities = $cities_arr;
        $locations = $locations_arr;
        return view('hotels.create', compact('country_arr','states','cities','locations'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                    'hotel_name' => 'required',
                    /*'location_id' => 'required|not_in:0',*/
                    'city_id' => 'required|not_in:0',
                    'state_id' => 'required|not_in:0',
                    'country_id' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            $arr = array();
            $arr['country_id'] = $request->country_id;
            $arr['state_id'] = $request->state_id;
            $arr['city_id'] = $request->city_id;
            return redirect('hotel/create')
                            ->withErrors($validator)
                            ->withInput()
                            ->with($arr);
        }
        $input = $request->all();
        if($request->hasFile('hotel_image')) {
            $file = Input::file('hotel_image');
            //getting timestamp
           // $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $request->hotel_name.time() . '-' .$file->getClientOriginalName();
            
            //$request->hotel_image = $name;
            $input['hotel_image'] = $name;
            $file->move(public_path().'/images/hotel_image/', $name);
        }

        
        
        $hotel_model = Hotel::create($input);
        //print "<pre>";
        //print_r($hotel_model->id);die();
        //return redirect('hotel');
        return redirect('hotelgallery/create/'.$hotel_model->id);
    }

    public function destroy($id) {
        $hotel = Hotel::find($id);
        $hotel->delete();
        return redirect('hotel');
    }

    public function edit($id) {
        $hotel = Hotel::findOrFail($id);
        $states = State::where('country_id', $hotel->country_id)->lists('state_name', 'id');
        $cities = City::where('state_id', $hotel->state_id)->lists('city_name', 'id');
        $locations = Location::where('city_id', $hotel->city_id)->lists('location_name', 'id');
        $countries = Country::lists('country_name', 'id');
        return view('hotels.edit', compact('hotel','locations', 'cities', 'states', 'countries'));
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
                    'hotel_name' => 'required',
                    /*'location_id' => 'required|not_in:0',*/
                    'city_id' => 'required|not_in:0',
                    'state_id' => 'required|not_in:0',
                    'country_id' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            $arr = array();
            $arr['country_id'] = $request->country_id;
            $arr['state_id'] = $request->state_id;
            $arr['city_id'] = $request->city_id;
            return redirect('hotel/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput()
                            ->with($arr);
        }
        $input = $request->all();
        if($request->hasFile('hotel_image')) {
            $file = Input::file('hotel_image');
            //getting timestamp
           // $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $request->hotel_name.time() . '-' .$file->getClientOriginalName();
            
            //$request->hotel_image = $name;
            $input['hotel_image'] = $name;
            $file->move(public_path().'/images/hotel_image/', $name);
        }else{
          $input['hotel_image'] = $request->old_image;  
        }
        $hotel = Hotel::findOrFail($id);
        $hotel->update($input);
        return redirect('hotel');
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
    
    public function getHotel($id) {
        $hotel_arr = array('0' => 'Select Hotel');
        $hotels = Hotel::where('city_id', $id)->lists('hotel_name', 'id');
        ?>
        <option value='0'>Select Hotel</option>
        <?php
        foreach ($hotels as $key => $val) {
            ?>
            <option value='<?php echo $key; ?>'><?php echo $val ?></option>
            <?php
        }
    }
    
    public function changeStat($id) {
        $hotel = Hotel::findOrFail($id);
        if($hotel->active =='Y')
        {
            $hotel->active = 'N';
        } 
        else
        {
            $hotel->active = 'Y';
        }   
        
        $hotel->save();
        echo "success";
    }
    

}
