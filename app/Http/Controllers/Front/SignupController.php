<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class SignupController extends Controller {

    public function __construct() {
    }

    public function index() {
       
         return view('frontlogin.signup');
    }

    public function registration(Request $request) {
         $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required|min:3|confirmed',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:users',
            
        ]);
        $input = $request->all();
        DB::table('users')
            
            ->insert(array(
                'name' => $input['fname'].' '.$input['lname'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'fname' => $input['fname'],
                'lname' => $input['lname'],
                'password' => md5($input['password']),
	        'type' => 1
                ));
        return redirect('user/login');
        
    }

    
}
