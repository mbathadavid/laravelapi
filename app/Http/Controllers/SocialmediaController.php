<?php

namespace App\Http\Controllers;
use App\Models\socialmedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    //Function to make sure insert a post in the database
    public function makePost(Request $req) {
        $post = new socialmedia;
        $post->aid = $req->uid;
        $post->Description = $req->post;

        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'image'.'.'.$extension;
            $file->move('images/', $filename);
        $post->images = $filename;
        } 

        $post->save();

        return response()->json([
            'status' => 200,
            'message' => 'Posted Successfully'
        ]);
        //else {
        //     return['messages' => 'No image here'];
        // }
    }
}
