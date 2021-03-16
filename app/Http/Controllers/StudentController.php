<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function viewStudent(){
        $student = Student::all();
        return view('student.view',compact('student'));
    }
    public function store(Request $request)
    {
        // dd($request); 

        // $this->validate($request,[
        //     'First name'=>'required',
        //     'Last name'=>'required',
        //     'Email'=>'required',
        //     'Phone Number'=>'required',
        //     'DOB'=>'required',
        //     'Gender'=>'required',

        //   ]);


        $student=new Student;
        $student->first_name=$request->input('first_name');
        $student->last_name=$request->input('last_name');
        $student->email=$request->input('email');
        $student->phone_number=$request->input('phone_number');
        $student->date_of_birth=$request->input('date_of_birth');
        $student->gender=$request->input('gender');
        $student->save();
        
        return redirect('view_student')->with('Data Saved');
    }

    public function delete($id)
    {       
        $student = Student::find($id); 
        
        $student->delete();
        return redirect('view_student');
    } 
    
    public function update(Request $request)
    {
        $student = Student::find($request->id);
        $student->first_name=$request->input('f_name');
        $student->last_name=$request->input('last_name');
        $student->email=$request->input('email');
        $student->phone_number=$request->input('phone_number');
        $student->date_of_birth=$request->input('date_of_birth');
        $student->gender=$request->input('gender');
        $student->save();
        return redirect('view_student');
        
    }
}
