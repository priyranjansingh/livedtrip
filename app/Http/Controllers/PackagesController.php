<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Package_detail;
use App\Models\Package_gallery;
use App\Models\Tour_category;
use App\Models\Tour_class;
use App\Models\Tour_theme;
use App\Models\Tour_inclusion;
use App\Models\Package_category;
use App\Models\Package_class;
use App\Models\Package_theme;
use App\Models\Package_inclusion;
use App\Models\Content;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Validator;
use Input;
use Session;

class PackagesController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $packages = Package::all();
        return view('packages.index')->with('packages', $packages);
    }


    public function create() {
        $tour_categories = Tour_category::lists('category_title', 'id');
        $tour_classes = Tour_class::lists('class_title', 'id');
        $tour_themes = Tour_theme::lists('theme_title', 'id');
        $tour_inclusions = Tour_inclusion::lists('inclusion_title', 'id');
        $cms = Content::lists('content_body');
        return view('packages.create', compact('tour_categories','tour_classes','tour_themes','tour_inclusions','cms'));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'package_title' => 'required',
            'package_cost' => 'required',
            'validfrom' => 'required',
            'validto' => 'required',
            'lastbooking_date' => 'required',
            'class_id' =>   'required',
            'theme_id' =>  'required',
            'cat_id' =>  'required',
            'inclusion_id' =>  'required',
            'package_overview' => 'required',
        ]);
        $package = $request->except('theme_id', 'cat_id');
        $package_model = Package::create($package);
        $pakage_id= $package_model->id;
        
        
            $class[]=array(
                "package_id"=>$pakage_id,
                "class_id"=>$request->input('class_id')
            );
           
        
        $class_model = Package_class::insert($class); 
        
       foreach ($request->input('theme_id') as $theme_id){
            $theme[]=array(
                "package_id"=>$pakage_id,
                "theme_id"=>$theme_id
            );
           
        }
        $theme_model = Package_theme::insert($theme);
        
        foreach ($request->input('cat_id') as $cat_id){
            $cat[]=array(
                "package_id"=>$pakage_id,
                "cat_id"=>$cat_id
            );
           
        }
        $cat_model = Package_category::insert($cat);
        
        foreach ($request->input('inclusion_id') as $inclusion_id){
            $inclusiion[]=array(
                "package_id"=>$pakage_id,
                "inclusion_id"=>$inclusion_id
            );
           
        }
        $inclusion_model = Package_inclusion::insert($inclusiion);
        
        
        return redirect('packagedetail/create/'.$pakage_id);
    }

    public function destroy($id) {
        $package = Package::find($id);
        $packages = Package::all();
        $package->delete();
        Package_detail::where('package_id', $id)->delete();
        Package_gallery::where('package_id', $id)->delete();
        Package_class::where('package_id', $id)->delete();
        Package_theme::where('package_id', $id)->delete();
        Package_category::where('package_id', $id)->delete();
        Package_inclusion::where('package_id', $id)->delete();
        return redirect('package');
    }

    public function edit($id) {
        $package = Package::findOrFail($id);
        $tour_categories = Tour_category::lists('category_title', 'id');
        $tour_classes = Tour_class::lists('class_title', 'id');
        $tour_themes = Tour_theme::lists('theme_title', 'id');
        $tour_inclusions = Tour_inclusion::lists('inclusion_title', 'id');
        $package_cats = Package_category::where('package_id', $id)->lists('cat_id');
        $package_classes = Package_class::where('package_id', $id)->lists('class_id');
        $package_themes = Package_theme::where('package_id', $id)->lists('theme_id');
        $package_inclusions = Package_inclusion::where('package_id', $id)->lists('inclusion_id');        
        return view('packages.edit',  compact('package','tour_categories','tour_classes','tour_inclusions','tour_themes','package_cats','package_classes','package_themes','package_inclusions'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'package_title' => 'required',
            'package_cost' => 'required',
            'validfrom' => 'required',
            'validto' => 'required',
            'lastbooking_date' => 'required',
            'class_id' =>   'required',
            'theme_id' =>  'required',
            'cat_id' =>  'required',
            'inclusion_id' =>  'required',
            'package_overview' => 'required',
        ]);
        $package_id = Package::findOrFail($id);
        
        $package = $request->except('theme_id', 'cat_id');

            $class[]=array(
                "package_id"=>$id,
                "class_id"=>$request->input('class_id')
            );

        Package_class::where('package_id', $id)->delete();
        $class_model = Package_class::insert($class); 
        
       foreach ($request->input('theme_id') as $theme_id){
            $theme[]=array(
                "package_id"=>$id,
                "theme_id"=>$theme_id
            );
           
        }
        Package_theme::where('package_id', $id)->delete();
        $theme_model = Package_theme::insert($theme);
        
        foreach ($request->input('cat_id') as $cat_id){
            $cat[]=array(
                "package_id"=>$id,
                "cat_id"=>$cat_id
            );
           
        }
        Package_category::where('package_id', $id)->delete();
        $cat_model = Package_category::insert($cat);
        
        foreach ($request->input('inclusion_id') as $inclusion_id){
            $inclusion[]=array(
                "package_id"=>$id,
                "inclusion_id"=>$inclusion_id
            );
           
        }
        Package_inclusion::where('package_id', $id)->delete();
        $inclusion_model = Package_inclusion::insert($inclusion);
        
        $package_id->update($package);
        return redirect('package');
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

    public function changeStat($id) {
        $package = Package::findOrFail($id);
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
