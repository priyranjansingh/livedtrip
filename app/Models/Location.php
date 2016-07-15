<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

    protected $fillable = [
        'location_name',
        'city_id',
        'country_id',
        'state_id',
        'meta_title',
        'meta_desc',
        'metatag',
        'location_image',
        'destination_details',
        'active'
    ];
   

}
