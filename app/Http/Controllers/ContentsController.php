<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContentsController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $contents = Content::all();
        return view('contents.index')->with('contents', $contents);
        //or
        //return view('contents.index',compact('contents'));
    }

   
    public function edit($id) {
        $content = Content::findOrFail($id);
        return view('contents.edit', compact('content'));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'content_body' => 'required',
        ]);
        $input =   $request->all();
        $content = Content::findOrFail($id);
        $content->update($input);
        return redirect('content');
    }

    //
}
