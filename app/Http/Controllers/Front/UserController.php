<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Input;
use DB;
use Auth;
use Socialite;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('frontauth', ['only' => [
                'index',
        ]]);
    }

    public function index(Request $request) {

        return view('frontend.myaccount');
    }

    public function logout(Request $request) {
        $request->session()->forget('user_email');
        return redirect('user/login');
    }

    public function redirectToProvider() {
        return Socialite::driver('facebook')->redirect();
    }
     public function redirectToGoogleProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('user/facebook');
        }

        $authUser = $this->findOrCreateUser($user);
        if (!empty($authUser)) {
            session(['user_email' => $authUser->email]);
        }

        return redirect('user/myaccount');
    }
    
    
    public function handleProviderGoogleCallback() {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('user/google');
        }

        $authUser = $this->findOrCreateGoogleUser($user);
        if (!empty($authUser)) {
            session(['user_email' => $authUser->email]);
        }

        return redirect('user/myaccount');
    }
    

    private function findOrCreateUser($facebookUser) {
        $authUser = Customer::where('facebook_id', $facebookUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        return Customer::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'avatar' => $facebookUser->avatar
        ]);
    }
    
     private function findOrCreateGoogleUser($googleUser) {
        $authUser = Customer::where('google_id', $googleUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        return Customer::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
        ]);
    }
    
    
    

}
