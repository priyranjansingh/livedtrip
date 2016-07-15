<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Location;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\Package_detail;
use App\Models\Package_gallery;
use App\Models\Hotel_gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Session;

class FrontPackagedetailsController extends Controller {
        
    public function index($name,$id) {
        $package_id = $id;
        $package = Package::findOrFail($id);
        $meta_title=$package->meta_title;
        $meta_description=$package->meta_desc;
        $meta_keywords=$package->keywords;
        $metatag=$package->metatag;
        $package_cats= DB::table('package_categories')
        ->where('package_categories.package_id',$package_id)
        ->join('tour_categories', 'package_categories.cat_id', '=', 'tour_categories.id')
        ->select('package_categories.id','tour_categories.*')
        ->get();
        
        $package_classes= DB::table('package_classes')
        ->where('package_classes.package_id',$package_id)
        ->join('tour_classes', 'package_classes.class_id', '=', 'tour_classes.id')
        ->select('package_classes.id','tour_classes.*')
        ->get();
        
        $package_themes= DB::table('package_themes')
        ->where('package_themes.package_id',$package_id)
        ->join('tour_themes', 'package_themes.theme_id', '=', 'tour_themes.id')
        ->select('package_themes.id','tour_themes.*')
        ->get();
        
        $package_inclusions= DB::table('package_inclusions')
        ->where('package_inclusions.package_id',$package_id)
        ->join('tour_inclusions', 'package_inclusions.inclusion_id', '=', 'tour_inclusions.id')
        ->select('package_inclusions.id','tour_inclusions.*')
        ->get();
        
        //$city_nights = DB::select('select c.city_name,p.night_count,p.city_id from cities as c, (SELECT package_day,count(city_id) as night_count,city_id,location_id FROM `package_details` WHERE `package_id`= :id AND `night_stay`= "Y" group by city_id) as p where p.`city_id` =  c.id order by p.`package_day`', ['id' => $package_id]);
        //$package_days = DB::select('select c.city_name,p.day_count,p.city_id from cities as c, (SELECT package_day,count(city_id) as day_count,city_id,location_id FROM `package_details` WHERE `package_id`= :id group by city_id) as p where p.`city_id` =  c.id order by p.`package_day`', ['id' => $package_id]);
        $package_city_res= DB::table('package_details')
        ->where('package_details.package_id',$package_id)
        ->join('cities', 'package_details.city_id', '=', 'cities.id')
        ->select('package_details.*', 'cities.city_name')
        ->get();
        $package_slot=array();
        $slot=0;
        $day_count=0;
        $night_count=0;
        $old_city_id=-1;
        $checkinfor=0;
        $array_cnt=1;
        foreach($package_city_res as $pck){
          if($pck->city_id!=$old_city_id){
            $slot++;
            $package_slot[$slot]['city_id'] = $pck->city_id;
            $package_slot[$slot]['city_name'] = $pck->city_name;
            $package_slot[$slot]['hotel_id'] = $pck->hotel_id;
            $day_count=0;
            $night_count=0;
            $old_city_id=-1;
          }
           $day_count++;
           if($pck->night_stay == "Y"){
            $night_count++;
           } 
           $package_slot[$slot]['day_count']=$day_count;
           $package_slot[$slot]['night_count']=$night_count; 
           $old_city_id= $pck->city_id;
           $array_cnt++;
        }
       
        //return $package_slot; 
        $package_details=array();
        $package_details = DB::table('package_details')
        ->where('package_details.package_id',$package_id)
        ->join('cities', 'package_details.city_id', '=', 'cities.id')
        ->join('countries', 'package_details.country_id', '=', 'countries.id')
        ->join('states', 'package_details.state_id', '=', 'states.id')
        ->join('locations', 'package_details.location_id', '=', 'locations.id')
        ->join('hotels', 'package_details.hotel_id', '=', 'hotels.id')
        ->select('package_details.*','hotels.*', 'locations.location_name','locations.location_image','locations.destination_details', 'cities.city_name', 'states.state_name', 'countries.country_name')
        ->get();       

        //return $package_details;
        $package_locations= DB::table('package_details')
        ->where('package_details.package_id',$package_id)
        ->join('locations', 'package_details.location_id', '=', 'locations.id')
        ->select('package_details.location_id','locations.*')
        ->distinct('package_details.location_id')->get();
        
        $package_hotels= DB::table('package_details')
        ->where('package_details.package_id',$package_id)
        ->join('hotels', 'package_details.hotel_id', '=', 'hotels.id')
        ->select('package_details.package_id','hotels.*')
        ->groupby('package_details.hotel_id')->get();
        
        $hotel_gallery=array();
        foreach($package_hotels as $hotel){
        $hotel_gallery[$hotel->id] = Hotel_gallery::where('hotel_id',$hotel->id)->get(); 
        }
        //return $hotel_gallery;
        $package_gallery = Package_gallery::where('package_id',$package_id)->get();
        

        
        return view('frontend.packagedetails', compact('package','package_details','package_slot','package_gallery','package_cats','package_themes','package_classes','package_inclusions','package_locations','package_hotels','hotel_gallery','meta_title','meta_description','meta_keywords','metatag'));
    }
  
}
