<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    //
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
        ],
        [
            'name.required' => 'Name khali nhi ho sakta',
            'email.required' => 'Email likhna zaroori hai',
            'email.email' => 'Please valid email likho',
            'email.unique' => 'Ye email phle use ho chuki hai',
        ]
    );
        Student::create([
            'name' => $request ->name,
            'email' => $request ->email,
        ]);
        return redirect('/students/create');
    }
    public function index()
    {
        $students = Student::all();

        return view('students.index',[
            'students' => $students
        ]);
    }

    public function edit($id){
        $student = Student::findOrFail($id);

        return view('students.edit',[
            'student' => $student
        ]);
    }
    public function update(Request $request, $id){
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,'.$id,
        ],
        [
            'name.required' =>'Name blank nahi chhod sakte',
            'email.required' => 'Email blank nahi rkh sakte',
            'email.email' => 'Email format galat hai',
            'email.unique' => 'Ye email kisi aur student ka hai',
        ]
    );

        

        $student -> update([
            'name' => $request->name,
            'email'=>$request->email,
        ]);
        return redirect('/students');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);

        $student->delete();
        return redirect('/students');
    }
}
