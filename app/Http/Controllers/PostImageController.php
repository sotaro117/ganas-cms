<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostImageController extends Controller
{
    public function upload(Request $request){
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('upload', $fileName, 'tinyMce');
        return response()->json(['location'=>"/storage/$path"]); 
        
        // $imgpath = $request->file('name')->store('upload', 'public');
        // return response()->json_encode(['location' => $imgpath]);
    }
}
