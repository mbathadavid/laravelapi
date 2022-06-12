<?php

namespace App\Http\Controllers;
use App\Models\socialmedia;
use App\Models\User;
use App\Models\notifications;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    //Function to make sure insert a post in the database
    public function makePost(Request $req) {
        //return ['data' => $req->all()];

        if($req->pcomment) {
            $ppost = socialmedia::find($req->pcomment);
            $value = $ppost['repliescount'];
            $newval = ++$value;
            $ppost->repliescount = $newval;
            $ppost->save();
        }

        if($req->type == "reply") {
            $notification = new notifications;
            $user = User::find($req->uid);
            $notification->aid = $req->uid;
            $notification->uprofile = $user['profile'];
            $notification->name = $user['fname'].' '.$user['lname'];
            $notification->description = $user['fname'].' '.$user['lname'].' replied to your post';
            $notification->save();
        }

        $post = new socialmedia;
        $user = User::find($req->uid);
        $post->aid = $req->uid;
        $post->type = $req->type;
        $post->uprofile = $user['profile'];
        $post->name = $user['fname'].' '.$user['lname'];
        $post->Description = $req->post;
        $post->parentcomment = $req->pcomment;

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
    }

    //Fetch Replies
    public function fetchReplies($pid) {
        $post = socialmedia::find($pid);
        $replies = socialmedia::where('parentcomment',$pid)
                                ->where('type','reply')
                                ->orderBy('created_at','desc')
                                ->get();

        return response()->json([
            'post' => $post,
            'replies' => $replies
        ]);                        
    }


    //Funtion to fetch posts
    public function fetchPosts($type) {
        $posts = socialmedia::where('type',$type)
                            ->orderBy('created_at','desc')
                            ->get();

        return response()->json([
            'posts' => $posts
        ]);
    }

    //Fecth Notifications
    public function fetchNotifications($uid) {
        $notifications = notifications::where('aid',$uid)
                                        ->where('viewed',0)
                                        ->orderBy('created_at','desc')
                                        ->get();

        return response()->json([
            'notifications' => $notifications
        ]);                                
    }
}
