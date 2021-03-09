<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
         //validation
         $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        //Sign-in (authentication)
        if (!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid Login Credentials');
        }

         //redirect
        return redirect()->route('dashboard');
    }
}
