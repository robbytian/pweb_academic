<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // $students = Student::where('gender','P')->get();
        // $students = Student::where('gender','P')->orWhere('birth_place','Bandung')->get();
        // $students = Student::orderBy('name','desc')->get();
        
        // $students = Student::where('birth_place','Jakarta')->where('gender','W')->get();
        // $students = Student::where('code','like','%6%')->get();
        // $students = Student::whereMonth('birth_date','08')->get();
        // $students = Student::limit(4)->get();
        // $students = Student::where(function($query1){
        //     $query1->where('code','like','%2%')->where('birth_place','Jakarta');
        // })
        // ->orWhere(function($query2){
        //     $query2->where('birth_place','like','%U%')->where('gender','W');
        // })->get();

        return view('student.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::pluck('name','id');
        return view('student.create',compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'gender'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
            'faculty_id'=>'required'
        ]);

        Student::create($request->all());
        return redirect('/student')->with('success','Student Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $faculties = Faculty::pluck('name','id');
        return view('student.edit', ['student'=>$student,'faculties'=>$faculties]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'gender'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
            'faculty_id'=>'required'
        ]);

        $student->update($request->all());
        return redirect('/student')->with('success','Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/student')->with('success','Student deleted');
    }
}
