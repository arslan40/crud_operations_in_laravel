<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function viewTeacher(){
        $teacher = teacher::all();
        return view('teacher.viewteacher',compact('teacher'));
    }
    
    public function add(Request $request)
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

// dd($request);
        $teacher=new Teacher();
        $teacher->first_name=$request->input('first_name');
        $teacher->last_name=$request->input('last_name');
        $teacher->email=$request->input('email');
        $teacher->phone_number=$request->input('phone_number');
        $teacher->subject=$request->input('subject');
        $teacher->date_of_birth=$request->input('date_of_birth');
        $teacher->gender=$request->input('gender');
        $teacher->save();
        
        return redirect('view_teacher')->with('Data Saved');
    }
   
    public function delete($id)
    {       
        $teacher = Teacher::find($id); 
        // dd($teacher);
        $teacher->delete();
        
        return redirect('view_teacher');
    } 

    
    public function update(Request $request)
    {
        // dd($request);
        $teacher = Teacher::find($request->id);
        $teacher->first_name=$request->input('f_name');
        $teacher->last_name=$request->input('last_name');
        $teacher->email=$request->input('email');
        $teacher->phone_number=$request->input('phone_number');
        $teacher->date_of_birth=$request->input('date_of_birth');
        $teacher->gender=$request->input('gender');
        $teacher->save();
        
        return redirect('view_teacher');
        
    }

    public function edit()
    {
        die('Arslan is a good programmer.');
    }

        


}
