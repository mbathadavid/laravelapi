<?php

namespace App\Http\Controllers;
use App\Models\socialmedia;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    //Function to make sure insert a post in the database
    public function makePost(Request $req) {
        // $post = new socialmedia;
        // $user = User::find($req->uid);
        // $post->aid = $req->uid;
        // $post->type = $req->type;
        // $post->uprofile = $user['profile'];
        // $post->name = $user['fname'].' '.$user['lname'];
        // $post->Description = $req->post;

        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'image'.'.'.$extension;
            $file->move('images/', $filename);

            return ['message' => $extension];
        //$post->images = $filename;
        } else {
            return ['message' => 'No image'];
        }

       // $post->save();

        // return response()->json([
        //     'status' => 200,
        //     'message' => 'Posted Successfully'
        // ]);
    }

    //Funtion to fetch posts
    public function fetchPosts($type) {
        $posts = socialmedia::where('type',$type)
                            ->get();

        return response()->json([
            'posts' => $posts
        ]);
    }
}
