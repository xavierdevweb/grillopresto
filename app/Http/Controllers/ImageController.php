<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request) {
        
        $image = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public', 'image/'.$image);


        return back();
    }
}
