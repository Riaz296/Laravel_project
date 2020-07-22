<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationFrom()
    {
        return view('frontend.user.register');
    }

    public function showprocessRegistration(Request $request)
    {
//        $this->validate($request, [
//            //validation
//            'name' => 'required',
//            'phone_number' => 'required',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required|min:6|confirmed',
//        ]);

        $validator=Validator::make(request()->all(),[
            'name' => 'required|max:10',
            'phone_number' => 'required|min:9|max:13',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('register')->with('message','Registration Successfully');

    }

    public function login()
    {
        return view('frontend.user.login');
    }

    public function process_login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user=User::where('email',$request->email)->first();
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('profile');
        }else{
            return back()->with('message','Invalid Email or Password');
        }
    }

    public function profile()
    {
        return view('frontend.user.profile');
    }
}
