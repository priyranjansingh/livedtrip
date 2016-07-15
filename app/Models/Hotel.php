<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {
    protected $table = 'hotels';
    protected $fillable = [
        'hotel_name',
        'city_id',
        'country_id',
        'state_id',
        'hotel_image',
        'hotel_address',
        'hotel_description',
        'hotel_rates',
        'hotel_amenities',
        'latitude',
        'longitude',
        'star_rating',
        'active',
        'meta_title',
        'metatag',
        'meta_desc'
    ];
   

}
