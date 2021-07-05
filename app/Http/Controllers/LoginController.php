<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //Login Function
    public function customLogin(Request $request)
    {
        //return $request->input();
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:3|max:16'
        ]);
        
        $user_info = User::where('email', '=' , $request->email)->first();

        if (!$user_info) 
        {
            return back()->with('fail','We do not recognize your email address');
        } 
        else 
        {
            if (Hash::check($request->password, $user_info->password)) 
            {
                session(['id'=>$user_info->id,'email'=>$user_info->email]);
                //$request->session()->put('email',$user_info->email);
                return redirect('dashboard');
            }
            else
            {
                return back()->with('fail','Inncorrect Password');
            }
        }
        
    }

    //Registration Function
    public function register(Request $request)
    {
        //return $request->input();
        //Validate request
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required_with:repetePassworrd|same:repetePassworrd|min:3|max:16',
            'repetePassworrd'=>'required|min:3|max:16'
        ]);

        //Insrt data into Database

        $user =new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return back()->with('success','New user has been added Successfuly');
        } else {
            return back()->with('fail','Something went wrong, try again later');
        }
        
    }

    //Logout Function
    public function logout()
    {
        if(session()->has('email'))
        {
            session()->pull('email');
            return redirect('login');
        }
    }
    
}