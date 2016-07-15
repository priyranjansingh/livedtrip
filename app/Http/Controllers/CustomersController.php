<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class CustomersController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
	 $customers = DB::table('users')
                ->get();
		return view('customers.index', compact('customers'));
    }

   public function create() {
        return view('customers.create');
    }
	public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
			'email' => 'required|email|unique:users'
        ]);

        $input = $request->all();
        DB::table('users')
            
            ->insert(array('name' => $input['name'],'email' => $input['email']));
        return redirect('customer');
    }
    public function edit($id) {
		$customer = DB::table('users')->where('id', $id)->first();
        return view('customers.edit', compact('customer'));
    }

	public function destroy($id) {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('customer');
    }
	
    public function update($id, Request $request) {
	
        $this->validate($request, [
			'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|numeric'
        ]);
		$input =   $request->all();
		DB::table('users')
            ->where('id', $id)
            ->update(array(
                'name' => $input['fname'].' '.$input['lname'],
                'phone' => $input['phone'],
                'fname' => $input['fname'],
                'lname' => $input['lname'],
                ));
        return redirect('customer');
    }

}
