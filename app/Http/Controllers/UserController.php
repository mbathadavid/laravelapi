<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Add New User
    public function addnewuser(Request $req){
        return ['message' => 'data Reached'];
    }
    //Return view for registering a new user
    public function registerview(){
        return view('apifiles.register');
    }
    //Return view for login 
    public function loginuser(){
        return view('apifiles.login');
    }
    //Return Dashboard view
    public function dashboard(){
        return view('apifiles.dashboard');
    }
    //Register new web user
    public function registerwebuser(Request $req){
        $validator = Validator::make($req->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ],
    [
        'phone.unique' => 'Sorry! This Phone Number is already registered',
        'email.unique' => 'Sorry! This Email is already Registered',
        'email.email' => 'The Email you entered is invalid. Enter a valid Email Address'
    ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = new User;
            $user->fname = $req->firstname;
            $user->lname = $req->lastname;
            $user->phone = $req->phone;
            $user->email = $req->email;
            $user->pass = $req->password;
            $user->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Congratulations. Thank you for taking your precious time to register an acccount with the fastest growing agricultural forum. Proceed to LOG IN and experience the best with us.'
            ]);
        }
    }
    //Register api user
    public function registerapiuser(Request $req){
        //return ['data' => $req->all()];
        $validator = Validator::make($req->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ],
    [
        'phone.unique' => 'Sorry! This Phone Number is already registered',
        'email.unique' => 'Sorry! This Email is already Registered',
        'email.email' => 'The Email you entered is invalid. Enter a valid Email Address'
    ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = new User;
            $user->fname = $req->firstname;
            $user->lname = $req->lastname;
            $user->phone = $req->phone;
            $user->email = $req->email;
            $user->pass = $req->password;
            $user->save();
            return response()->json([
                'status' => 200,
                'messages' => 'Congratulations. Thank you for taking your precious time to register an acccount with the fastest growing agricultural forum. Proceed to LOG IN and experience the best with us.'
            ]);
        }
    }
    //Login web user
    public function loginwebuser(Request $req){
        $validator = Validator::make($req->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $user = User::where('email',$req->email)->first();
            if ($user) {
                if ($req->password == $user->pass) {
                    $req->session()->put('LoggedInUser',$user);
                    return response()->json([
                        'status' => 200,
                        'messages' => 'success'
                    ]);
                } else{
                    return response()->json([
                        'status' => 401,
                        'messages' => 'Email or password is wrong'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 401,
                    'messages' => 'No user with such Email found'
                ]);
            } 
        }
    }
    //Login api user
    public function loginapiuser(Request $req){
        $validator = Validator::make($req->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {
            $emailorphone = $req->email;

            if (is_numeric($emailorphone)) {
                $user = User::where('phone',$emailorphone)->first();
                if ($user) {
                    if ($req->password == $user->pass) {
                        //$req->session()->put('LoggedInUser',$user);
                        return response()->json([
                            'status' => 200,
                            'messages' => $user,
                        ]);
                    } else {
                        return response()->json([
                            'status' => 401,
                            'messages' => 'The password you entered is incorrect'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'No Account with such Phone Number found'
                    ]);
                }

            } else {
                $user = User::where('email',$emailorphone)->first();
                if ($user) {
                    if ($req->password == $user->pass) {
                        //$req->session()->put('LoggedInUser',$user);
                        return response()->json([
                            'status' => 200,
                            'messages' => $user,
                        ]);
                    } else {
                        return response()->json([
                            'status' => 401,
                            'messages' => 'The password you entered is incorrect'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 401,
                        'messages' => 'No Account with such Email found'
                    ]);
                }

            }
            
            
        }
    }
}
