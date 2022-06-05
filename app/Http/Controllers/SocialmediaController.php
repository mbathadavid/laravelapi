<?php

namespace App\Http\Controllers;
use App\Models\socialmedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    //Function to make sure insert a post in the database
    public function makePost(Request $req) {
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'image'.'.'.$extension;
            $file->move('images/', $filename);

            return [
                'messages' => $extension,
                'filename' => $filename
            ];
        } else {
            return['messages' => 'No image here'];
        }
    }
}
