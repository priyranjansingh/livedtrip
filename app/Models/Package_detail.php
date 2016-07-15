<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package_detail extends Model {

    protected $fillable = [
        'package_id',
        'country_id',
        'state_id',
        'city_id',
        'location_id',
        'night_stay',
        'hotel_id',
        'package_day',
        'sightseeing',
        'meal'
    ];
   

}
