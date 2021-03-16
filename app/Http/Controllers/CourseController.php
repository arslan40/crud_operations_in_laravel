<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function viewCourse()
    {
        $course = Course::join('teachers', 'courses.teacher_id', '=', 'teachers.id')
        ->select(
            'courses.*',
            'teachers.first_name AS teacher_first_name',
            'teachers.last_name AS teacher_last_name'
            )
        ->get();
        // dd($course);
        return view('course.viewcourse', compact('course'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $course=new Course;
        $course->teacher_id=$request->input('teacher_id');
        $course->credit_hours=$request->input('credit_hours');
        $course->save();
    
        
        return redirect('view_course')->with('Data Saved');

    }

    public function delete($id)
    {       
        $course = Course::find($id); 
        $course->delete();
        
        return redirect('view_course');
    } 

    public function update(Request $request)
    {
        // dd($request);
        $course = Course::find($request->id);
        $course->teacher_id=$request->input('teacher_id');
        $course->credit_hours=$request->input('credit_hours');
        $course->save();
        
        return redirect('view_course');
        
    }
    // public function edit()
    // {
    //     die('abc');
    // }

}
