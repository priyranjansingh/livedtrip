<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    
    protected $table = 'users';

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'password',
        'type',
        'email',
        'name',
        'facebook_id',
        'google_id',
        'avatar'
    ];
   

}
