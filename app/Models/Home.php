<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Home extends Model {

    public static function getPackages($going_to) {
        $return_arr = array();
        $package_array = array();
        $city = DB::table('cities')
                ->where('city_name', 'LIKE', '%' . $going_to . '%')
                ->select('id', 'city_name')
                ->first();
        if (empty($city)) {
            $city = DB::table('states')
                    ->where('state_name', 'LIKE', '%' . $going_to . '%')
                    ->select('id', 'state_name')
                    ->first();
        }

        if (!empty($city)) {
            $city_id = $city->id;
        }
        //print $city_id;
        $package_ids = DB::table('package_details')
                ->where('city_id', $city_id)
                ->orWhere('state_id', $city_id)
                ->select('package_id')
                ->distinct()
                ->get();

        $min_price = 0;
        $max_price = 0;
        $min_night = 1;
        $max_night = 1;
        $budget_count = 0;
        $standard_count = 0;
        $premium_count = 0;
        $luxury_count = 0;
        $deluxe_count = 0;
        $group_count = 0;
        //pre($package_ids,true);
        foreach ($package_ids as $package_id) {
            $sub_package_arr = array();

            $package_main_detail = DB::table('packages')
                    ->where('id', $package_id->package_id)
                    ->where('active', 'Y')
                    ->select('*')
                    ->first();
            if (!empty($package_main_detail)) {
                if ($package_main_detail->class_id == 1) {
                    $budget_count = $budget_count + 1;
                } else if ($package_main_detail->class_id == 2) {
                    $standard_count = $standard_count + 1;
                } else if ($package_main_detail->class_id == 3) {
                    $premium_count = $premium_count + 1;
                } else if ($package_main_detail->class_id == 4) {
                    $luxury_count = $luxury_count + 1;
                } else if ($package_main_detail->class_id == 5) {
                    $deluxe_count = $deluxe_count + 1;
                }



                if (empty($min_price)) {
                    $min_price = $package_main_detail->package_cost;
                }
                if (empty($max_price)) {
                    $max_price = $package_main_detail->package_cost;
                }
                if ($package_main_detail->package_cost > $max_price) {
                    $max_price = $package_main_detail->package_cost;
                }
                if ($package_main_detail->package_cost < $min_price) {
                    $min_price = $package_main_detail->package_cost;
                }
                if ($package_main_detail->totalnight > $max_night) {
                    $max_night = $package_main_detail->totalnight;
                }


                $sub_package_arr['main'] = $package_main_detail;
                // getting the package detail
                $package_details = DB::table('package_details')
                        ->where('package_id', $package_id->package_id)
                        ->select('*')
                        ->get();
                $sub_package_arr['package_details'] = $package_details;
                // end of getting the package detail
                // package nights
                $night_results = DB::select('select c.city_name,p.night_count from cities as c, (SELECT count(city_id) as night_count,city_id FROM 
`package_details` WHERE `package_id`= :id AND `night_stay`=:ns  group by city_id) as p where p.`city_id` =  c.id', ['id' => $package_id->package_id, 'ns' => 'Y']);
                $sub_package_arr['package_nights'] = $night_results;
                // end of package nights
                // getting the gallery detail
                $package_gallery = DB::table('package_galleries')
                        ->where('package_id', $package_id->package_id)
                        ->select('*')
                        ->first();
                $sub_package_arr['package_gallery'] = $package_gallery;
                // end of getting the gallery detail
                // start of getting the package inclusions

                $inclusion_results = DB::select('select ti.`inclusion_title`,ti.`css_class` from '
                                . '`tour_inclusions` ti , `package_inclusions` pi where '
                                . 'pi.`inclusion_id` = ti.id AND pi.`package_id` = :id', ['id' => $package_id->package_id]);
                $sub_package_arr['inclusions'] = $inclusion_results;


                // end of getting the package inclusions
                
                // for getting whether this package is customizable or not
                $package_customizable = DB::table('package_categories')
                    ->where('package_id', $package_id->package_id)
                    ->where('cat_id',8)
                    ->select('*')
                    ->first();
                if(!empty($package_customizable))
                {
                   $sub_package_arr['customizable'] = 'YES';    
                }
                else
                {
                   $sub_package_arr['customizable'] = 'NO'; 
                }    
                
                // end for getting whether this package is customizable or not
                
                
                // for deciding whether this is grouped package or not
                $package_group = DB::table('package_categories')
                    ->where('package_id', $package_id->package_id)
                    ->where('cat_id',5)
                    ->select('*')
                    ->first();
                if(!empty($package_group))
                {
                   ++$group_count;
                   $sub_package_arr['group'] = 'YES';   
                }
				else
                {
                   $sub_package_arr['group'] = 'NO'; 
                }  
                  
                 
                
                // end for deciding whether this is grouped package or not
                


                array_push($package_array, $sub_package_arr);
            }
        }
        $return_arr['package_array'] = $package_array;
        $return_arr['min_price'] = $min_price;
        $return_arr['max_price'] = $max_price;
        $return_arr['min_night'] = $min_night;
        $return_arr['max_night'] = $max_night;
        $return_arr['budget_count'] = $budget_count;
        $return_arr['standard_count'] = $standard_count;
        $return_arr['premium_count'] = $premium_count;
        $return_arr['luxury_count'] = $luxury_count;
        $return_arr['deluxe_count'] = $deluxe_count;
        $return_arr['group_package_count'] = $group_count;

        return $return_arr;
    }

    public static function filterPackages($going_to, $min_price, $max_price, $min_night, $max_night, $class_arr, $theme_arr, $sort_param, $sort_type,$package_type) {
        $return_arr = array();
        $package_array = array();
        $city = DB::table('cities')
                ->where('city_name', 'LIKE', '%' . $going_to . '%')
                ->select('id', 'city_name')
                ->first();

        if (empty($city)) {
            $city = DB::table('states')
                    ->where('state_name', 'LIKE', '%' . $going_to . '%')
                    ->select('id', 'state_name')
                    ->first();
        }

        if (!empty($city)) {
            $city_id = $city->id;
        }

        $package_ids = DB::table('package_details')
                ->where('city_id', $city_id)
                ->orWhere('state_id', $city_id)
                ->select('package_id')
                ->distinct()
                ->get();

        $package_ids_arr = array();
        foreach ($package_ids as $val) {
            array_push($package_ids_arr, $val->package_id);
        }
        
        if($package_type == 'group_package')
        {
            $package_type_package_ids = DB::table('package_categories')
                    ->whereIn('package_id', $package_ids_arr)
                    ->where('cat_id', 5)
                    ->select('package_id')
                    ->distinct()
                    ->get();
            $package_type_package_ids_arr = array();
            foreach ($package_type_package_ids as $val) {
                array_push($package_type_package_ids_arr, $val->package_id);
            }
            $package_ids_arr = $package_type_package_ids_arr;
        }    
        
        
        
        $theme_arr = json_decode($theme_arr);
        if (!empty($theme_arr)) {
            $theme_package_ids = DB::table('package_themes')
                    ->whereIn('package_id', $package_ids_arr)
                    ->whereIn('theme_id', $theme_arr)
                    ->select('package_id')
                    ->distinct()
                    ->get();
            $theme_package_ids_arr = array();
            foreach ($theme_package_ids as $val) {
                array_push($theme_package_ids_arr, $val->package_id);
            }
            $package_ids_arr = $theme_package_ids_arr;
        }
        
        $class_arr = json_decode($class_arr);
        if (!empty($class_arr)) {
            $final_package_ids = DB::table('packages')
                    ->where('active', 'Y')
                    ->whereIn('id', $package_ids_arr)
                    ->whereIn('class_id', $class_arr)
                    ->where('package_cost', '<=', $max_price)
                    ->where('package_cost', '>=', $min_price)
                    ->where('totalnight', '>=', $min_night)
                    ->where('totalnight', '<=', $max_night)
                    ->orderBy($sort_param, $sort_type)
                    ->select('id')
                    ->get();
        } else {
            $final_package_ids = DB::table('packages')
                     ->where('active', 'Y')
                    ->whereIn('id', $package_ids_arr)
                    ->where('package_cost', '<=', $max_price)
                    ->where('package_cost', '>=', $min_price)
                    ->where('totalnight', '>=', $min_night)
                    ->where('totalnight', '<=', $max_night)
                    ->orderBy($sort_param, $sort_type)
                    ->select('id')
                    ->get();
        }
        //pre($final_package_ids,true);
        foreach ($final_package_ids as $package_id) {
            $sub_package_arr = array();

            $package_main_detail = DB::table('packages')
                     ->where('active', 'Y')
                    ->where('id', $package_id->id)
                    ->select('*')
                    ->first();
            if (!empty($package_main_detail)) {

                $sub_package_arr['main'] = $package_main_detail;
                // getting the package detail
                $package_details = DB::table('package_details')
                        ->where('package_id', $package_id->id)
                        ->select('*')
                        ->get();
                $sub_package_arr['package_details'] = $package_details;
                // end of getting the package detail
                // package nights
                $night_results = DB::select('select c.city_name,p.night_count from cities as c, (SELECT count(city_id) as night_count,city_id FROM 
`package_details` WHERE `package_id`= :id AND `night_stay`=:ns  group by city_id) as p where p.`city_id` =  c.id', ['id' => $package_id->id, 'ns' => 'Y']);
                $sub_package_arr['package_nights'] = $night_results;
                // end of package nights
                // getting the gallery detail
                $package_gallery = DB::table('package_galleries')
                        ->where('package_id', $package_id->id)
                        ->select('*')
                        ->first();
                $sub_package_arr['package_gallery'] = $package_gallery;
                // end of getting the gallery detail
                // start of getting the package inclusions

                $inclusion_results = DB::select('select ti.`inclusion_title`,ti.`css_class` from '
                                . '`tour_inclusions` ti , `package_inclusions` pi where '
                                . 'pi.`inclusion_id` = ti.id AND pi.`package_id` = :id', ['id' => $package_id->id]);
                $sub_package_arr['inclusions'] = $inclusion_results;


                // end of getting the package inclusions
                
                 // for getting whether this package is customizable or not
                $package_customizable = DB::table('package_categories')
                    ->where('package_id', $package_id->id)
                    ->where('cat_id',8)
                    ->select('*')
                    ->first();
                if(!empty($package_customizable))
                {
                   $sub_package_arr['customizable'] = 'YES';    
                }
                else
                {
                   $sub_package_arr['customizable'] = 'NO'; 
                }    
                
                // end for getting whether this package is customizable or not

				                // for deciding whether this is grouped package or not
                $package_group = DB::table('package_categories')
                    ->where('package_id', $package_id->id)
                    ->where('cat_id',5)
                    ->select('*')
                    ->first();
                if(!empty($package_group))
                {
                    $sub_package_arr['group'] = 'YES';   
                }
		else
                {
                   $sub_package_arr['group'] = 'NO'; 
                }  
                  
                 
                
                // end for deciding whether this is grouped package or not
                array_push($package_array, $sub_package_arr);
            }
        }
        $return_arr['package_array'] = $package_array;
        return $return_arr;
    }

    public static function getThemes() {
        $themes = DB::table('tour_themes')
                ->where('active', 'Y')
                ->select('id', 'theme_title', 'css_class')
                ->get();
        return $themes;
    }

}
