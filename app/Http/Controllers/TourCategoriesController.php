<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tour_category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TourCategoriesController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tour_categories = Tour_Category::all();
        return view('tour_categories.index')->with('tour_categories', $tour_categories);
        //or
        //return view('classes.index',compact('classes'));
    }

    public function show($id) {
        $tour_category = Tour_Category::findOrFail($id);
        return view('tour_categories.show', compact('tour_category'));
    }

    public function create() {
        return view('tour_categories.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'category_title' => 'required',
        ]);

        $input = $request->all();
        Tour_Category::create($input);
        return redirect('tour-category');
    }

    public function destroy($id) {
        $country = Tour_Category::find($id);
        $country->delete();
        return redirect('tour-category');
    }

    public function edit($id) {
        $tour_category = Tour_Category::findOrFail($id);
        return view('tour_categories.edit', compact('tour_category'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'category_title' => 'required',
        ]);
        $input =   $request->all();
        $tour_category = Tour_Category::findOrFail($id);
        $tour_category->update($input);
        return redirect('tour-category');
    }

    public function changeStat($id) {
        $package = Tour_Category::findOrFail($id);
        if($package->active =='Y')
        {
            $package->active = 'N';
        } 
        else
        {
            $package->active = 'Y';
        }   
        
        $package->save();
        
    }

    //
}
