<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tour_class;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TourClassesController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tour_classes = Tour_class::all();
        return view('tour_classes.index')->with('tour_classes', $tour_classes);
        //or
        //return view('classes.index',compact('classes'));
    }

    public function show($id) {
        $tour_class = Tour_class::findOrFail($id);
        return view('tour_classes.show', compact('tour_class'));
    }

    public function create() {
        return view('tour_classes.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'class_title' => 'required',
        ]);

        $input = $request->all();
        Tour_class::create($input);
        return redirect('tour-class');
    }

    public function destroy($id) {
        $country = Tour_class::find($id);
        $country->delete();
        return redirect('tour-class');
    }

    public function edit($id) {
        $tour_class = Tour_class::findOrFail($id);
        return view('tour_classes.edit', compact('tour_class'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'class_title' => 'required',
        ]);
        $input =   $request->all();
        $tour_class = Tour_class::findOrFail($id);
        $tour_class->update($input);
        return redirect('tour-class');
    }

    //
}
