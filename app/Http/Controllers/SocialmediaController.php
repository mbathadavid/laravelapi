<?php

namespace App\Http\Controllers;
use App\Models\socialmedia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SocialmediaController extends Controller
{
    //Function to make sure insert a post in the database
    public function makePost(Request $req) {
        return ['data' => $req->all()[0]];
    }
}
