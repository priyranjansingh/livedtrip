<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tour_theme;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TourThemesController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $Tour_themes = Tour_theme::all();
        return view('tour_themes.index')->with('tour_themes', $Tour_themes);
        //or
        //return view('classes.index',compact('classes'));
    }

    public function show($id) {
        $tour_theme = Tour_theme::findOrFail($id);
        return view('tour_themes.show', compact('tour_theme'));
    }

    public function create() {
        return view('tour_themes.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'theme_title' => 'required',
        ]);

        $input = $request->all();
        Tour_theme::create($input);
        return redirect('tour-theme');
    }

    public function destroy($id) {
        $country = Tour_theme::find($id);
        $country->delete();
        return redirect('tour-theme');
    }

    public function edit($id) {
        $tour_theme = Tour_theme::findOrFail($id);
        return view('tour_themes.edit', compact('tour_theme'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'theme_title' => 'required',
        ]);
        $input =   $request->all();
        $tour_theme = Tour_theme::findOrFail($id);
        $tour_theme->update($input);
        return redirect('tour-theme');
    }

    //
}
