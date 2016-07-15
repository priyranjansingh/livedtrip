<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Home;
use App\Models\Content;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Session;

class HomeController extends Controller {

    public function __construct() {
        
    }

    public function index() {
    
        $month = array('' => 'Month of Travel(Any)');
        for ($i = 0; $i <= 6; $i++) {
            $key = date('Y-m-d', strtotime("+$i month"));
            $value = date('F Y', strtotime("+$i month"));
            $month[$key] = $value;
        }
        $data['month'] = $month;
        $contents = Content::all();
        foreach ($contents as $content){
            if($content->id==6){
                $data['meta_title']=$content->content_body;
            }
            if($content->id==7){
                $data['meta_description']=$content->content_body;
            }
            if($content->id==8){
                $data['meta_keywords']=$content->content_body;
            }
        }   
        return view('home.index', $data);
    }

    public function getCity(Request $request) {
        $city = $request->input('term');
        $cities = DB::table('cities')
                ->where('city_name', 'LIKE','%'. $city . '%')
                ->select('city_name')
                ->lists('city_name');
        
        $state = $request->input('term');
        $states = DB::table('states')
                ->where('state_name', 'LIKE','%'. $state . '%')
                ->select('state_name')
                ->lists('state_name');
        
       $cities =array_merge($cities,$states); 
        
        return json_encode($cities);
    }
    
    public function searchResult(Request $request) {
        $this->validate($request, [
            'going_to' => 'required',
        ]);       
        $going_from = $request->going_from;
        $going_to = $request->going_to;
        $date = $request->travel_month;
        $month = array('' => 'Month of Travel(Any)');
        for ($i = 0; $i <= 6; $i++) {
            $key = date('Y-m-d', strtotime("+$i month"));
            $value = date('F Y', strtotime("+$i month"));
            $month[$key] = $value;
        }
        session(['going_to' => $request->going_to,'going_from'=>$request->going_from,'month'=>$month,'travel_month'=>$date]);
        //return $going_to;
        return redirect('search/'.$going_to);
        
    }
    
    public function searchView($going_to) {     
        $going_from = session('going_from');
        $going_to = session('going_to');
        $package_array = Home::getPackages($going_to);
        //print_r($package_array);die("here");
        $themes_array = Home::getThemes();
        
        //pre($themes_array,true);
        $date = session('travel_month');

        $data['package_arr'] = $package_array['package_array'];
        $data['min_price'] = $package_array['min_price'];
        $data['max_price'] = $package_array['max_price'];
        $data['min_night'] = $package_array['min_night'];
        $data['max_night'] = $package_array['max_night'];
        $data['going_to'] = $going_to;
        $data['going_from'] = $going_from;
        $data['travel_month'] = $date;
        $data['themes_array'] = $themes_array;
        $data['budget_count'] = $package_array['budget_count'];
        $data['standard_count'] = $package_array['standard_count'];
        $data['premium_count'] = $package_array['premium_count'];
        $data['luxury_count'] = $package_array['luxury_count'];
        $data['deluxe_count'] = $package_array['deluxe_count'];
        $data['group_package_count'] = $package_array['group_package_count'];
        
        $month = array('' => 'Month of Travel(Any)');
        for ($i = 0; $i <= 6; $i++) {
            $key = date('Y-m-d', strtotime("+$i month"));
            $value = date('F Y', strtotime("+$i month"));
            $month[$key] = $value;
        }
        $data['month'] = $month;       
//        print "<pre>";
//        print_r($package_array);
//        die("here");
        return view('home.searchresult', $data);
    }
    
    
    
   public function searchCriteria(Request $request)
   {
     $going_to = session('going_to');  
     $min_price =  $request->min_price;
     $max_price =  $request->max_price;
     $min_night =  $request->min_night;
     $max_night =  $request->max_night;
     $class_arr =  $request->class_arr;
     $theme_arr =  $request->theme_arr;
     $sort = $request->hid_sort;
     $sort_arr = explode('_',$sort); 
     $package_type =  $request->package_type;
     
     if($sort_arr[0]=='duration')
     {
         $sort_param = "totalnight";
         $sort_type = $sort_arr[1];
     }
     else if($sort_arr[0]=='price')
     {
         $sort_param = "package_cost";
         $sort_type = $sort_arr[1];
     }    
     $package_array = Home::filterPackages($going_to,$min_price,$max_price,$min_night,$max_night,$class_arr,$theme_arr,$sort_param,$sort_type,$package_type);
     $data['package_arr'] = $package_array['package_array']; 
     
     //return (String) view('home.filterresult', $data);
     $return_arr = array();   
     $return_arr['srch_html'] = (String) view('home.filterresult', $data);
     $return_arr['srch_count'] = count($data['package_arr']);
     return json_encode($return_arr);
       
   }        

}
