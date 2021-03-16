<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        
        return view('layout.login');
    }
    
    public function store(Request $request)
    {
        if (!Auth::attempt($request->only('email','password')))
           {
               return back()->with('status','Invalid login details');
           }

           
           $role=Auth::user()->role;
           if($role=='Teacher')
           {
               return redirect('/view_teacher');
           }
           else {

               return redirect('/view_student');
                
           }

    }
}
