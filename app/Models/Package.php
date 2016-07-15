<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {
    protected $fillable = [
        'package_title',
        'package_cost',
        'validfrom',
        'validto',
        'totalday',
        'totalnight',
        'terms',
        'service_policy',
        'lastbooking_date',
        'inclusions',
        'exclusions',
        'payment_policy',
        'cancellation_policy',
        'detail_itinerary',
        'package_overview',  
        'package_ordering',
        'promotional',
        'package_tag',
        'meta_title',
        'metatag',
        'meta_desc',
        'keywords',
        'active',
        'class_id'
    ];
   

}
