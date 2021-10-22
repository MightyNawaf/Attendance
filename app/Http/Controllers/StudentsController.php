<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Attendance;
use App\Models\Courses;
use Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $course_id = $id;
        return view('students.create', compact('course_id'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Students();
        $students->student_name = $request->input('student_name');
        $students->student_id = $request->input('student_id');
        $students->course_id = $request->input('course_id');;
        $students->student_phone = $request->input('student_phone');
        $students->save();
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course_id=$id;
        $course = Courses::find($id);
        $students = Students::where('course_id', '=', $id)->get();
        foreach($students as $s){
            $attendances = [
                'count' => Attendance::where([['course_id','=',$course_id],['student_id','=', $s->id]])->count()
            ];
            }
        return view('students.show', compact('students', 'course_id', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Students::find($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Students::find($id);
        $student->student_name = $request->input('student_name');
        $student->student_id = $request->input('student_id');
        $student->student_phone = $request->input('student_phone');
        $student->save();
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $student = Students::find($id);
    $student->delete();
    return redirect()->route('courses.index');
}
}