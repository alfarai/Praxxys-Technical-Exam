<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginPage(){
        return view('users.login'); 
    }
    public function registerPage(){
        return view('users.register'); 
    }
    public function register(Request $request){
        $user = new User();

        $user->name = $request->username;
        $user->email = $request->email;

        $password = $request->password;
        $confirm = $request->confirmpassword;
        if($password != $confirm){
            return redirect()->route('user.register')->with('fail', 'Password doesn\'t match.');
        }
        else{
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('product.index')->with('success', 'User logged in.');
            
        
    }
    public function login(Request $request){
        $credentialsWithEmail =[
            'email' => $request->username,
            'password' => $request->password,
        ];
        $credentialsWithName =[
            'name' => $request->username,
            'password' => $request->password,
        ];
        $remember = $request->remember;


        
        if(!Auth::attempt($credentialsWithEmail,$remember)){
            if(!Auth::attempt($credentialsWithName,$remember)){
            return redirect()->route('user.login')->with('fail', 'Invalid Credentials.');
            }
        }

        //$request->session()->regenerate();
        return redirect()->route('product.index')->with('success', 'User logged in.');
            
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }
}
