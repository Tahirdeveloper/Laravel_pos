<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authcontroller extends Controller
{
    //
    public function getlogin(){
        return view('login');
    }
    public function postlogin(Request $request){
        
    $email = $request->input('email');
    $password = $request->input('password');

    // echo "Email: $email<br>";
    // echo "Password: $password<br>";
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials = $request->only('email', 'password', 'name');

        if (Auth::attempt($credentials)) {
            $admin = Auth::user();
            return redirect()->route('dashboard')->with('name', $admin->name);
        } else {
            return redirect()->back()->with('invalid_credentials', 'Invalid email or password');
        }

        $validate=auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'admin'=>1
        ]);
        if($validate){
            return redirect()->route('dashboard');
        }else{
           // return redirect()->route('dashboard');
        
        
            return redirect()->back()->with('invalid_credentials', 'Invalid email or password.');
        }
    }
}
