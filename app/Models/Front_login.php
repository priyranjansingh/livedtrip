<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model {

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'password',
        'type',
        'email'
        
    ];

}
