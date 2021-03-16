<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Teacher;
use App\Student;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {

        return view('layout.register');
    }
    public function store(Request $request)
    {
        // dd($request);
        $user = new User();
        $user->name = $request->input('first_name') . ' ' . $request->input('last_name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = Hash::make($request->password);
        $user->save();
        // dd($user);

        if ($user->role == "Teacher") {
            $teacher = new Teacher();
            $teacher->first_name = $request->input('first_name');
            $teacher->last_name = $request->input('last_name');
            $teacher->email = $request->input('email');
            $teacher->phone_number = $request->input('phone_number');
            $teacher->date_of_birth = $request->input('date_of_birth');
            $teacher->gender = $request->input('gender');
            $teacher->subject = $request->input('subject');
            $teacher->save();
        } else {
            $student = new Student;
            $student->first_name = $request->input('first_name');
            $student->last_name = $request->input('last_name');
            $student->email = $request->input('email');
            $student->phone_number = $request->input('phone_number');
            $student->date_of_birth = $request->input('date_of_birth');
            $student->gender = $request->input('gender');
            $student->save();
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }
        $role = Auth::user()->role;
        if ($role == 'Teacher') {
            return redirect('/view_teacher');
        } else {

            return redirect('/view_student');
        }
    }
}
