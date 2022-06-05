<?php

namespace App\Http\Controllers;
use App\Models\socialmedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    //Function to make sure insert a post in the database
    public function makePost(Request $req) {
        // if ($req->hasFile('image')) {
        //     $file = $req->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'image'.'.'.$extension;
        //     $file->move('images/', $filename);

        //     return ['messages' => $extension];
        // } else {
            return['messages' => $req->all()];
        //}
    }
}
