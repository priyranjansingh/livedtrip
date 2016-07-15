<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Hotel_gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Session;

class HotelgalleryController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

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

    public function create($id) {
        $hotel_id = $id;
        return view('hotelgallery.create', compact('hotel_id'));
    }

    public function store(Request $request) {
        // start of image upload 
        if (!empty($_FILES['gallery_img']['name'][0])) {
            foreach ($_FILES['gallery_img']['tmp_name'] as $key => $val) {
                $image_name = time() . "_" . $key . "_" . $_FILES['gallery_img']['name'][$key];
                copy($val, public_path().'/images/hotel_gallery/' . $image_name);
                $hotel_gallery = new Hotel_gallery;
                $hotel_gallery->hotel_id = $request->hotel_id;
                $hotel_gallery->image_name = $image_name;
                $hotel_gallery->save();
            }
        }
        return redirect('hotel');
        // end of the image upload
    }

    public function destroy($id) {
        $hotel_gallery = Hotel_gallery::find($id);
        $hotel_gallery->delete();
        echo "SUCCESS";
    }
    
    
    

    public function edit($id) {
        $hotel_gallery = Hotel_gallery::where('hotel_id',$id)->get();
        $hotel_id = $id;
        return view('hotelgallery.edit', compact('hotel_gallery','hotel_id'));
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
