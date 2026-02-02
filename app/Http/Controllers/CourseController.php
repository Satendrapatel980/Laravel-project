<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        
        $courses = Course::all();
         
        return view('Courses.index',[
            'courses' => $courses
        ]);

    }

    public function create(){
        return view('Courses.create');
    }

    public function store(Request $request){
        // 1. validation
        $request->validate(
            [
                'title' => 'required',
                'price' =>'required|numeric',
            ],
            [
                'title.required'=>'Title bharo',
                'price.required' => 'Price khali nhi hona chaiye',
                'price.numeric'=>'Price numbers mein dalo',
            ]
        );

        // 2. Save to database
        Course::create([
            'title'=>$request->title,
            'price' => $request->price,
        ]);

        //3. Redirect to list
        return redirect('/courses');

    }

    public function edit($id){
        $course = Course::findOrFail($id);

        return view('courses.edit',[
            'course' => $course 
        ]);
    }

    public function update(Request $request, $id){
        // 1. Validation 
        $request->validate(
            [
            'title' => 'required',
            'price' => 'required | numeric',
        ],
        [
            'title.required' => 'Title Bhul gye lg rha hai',
            'price.required' => 'Price dalo bhai',
            'price.numeric' => 'Price number mein hona chaiye',
        ]
    );

    // 2. Find course
    $course = Course::findOrFail($id);

    // 3. Update 
    $course->update([
        'title' => $request->title,
        'price' => $request->price,
    ]);

    return redirect ('/courses');
    }

    public function destroy($id){
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect('/courses');
    }

}
