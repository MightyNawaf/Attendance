<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Students;
use App\Models\Courses;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $course_id=$id;
        $course = Courses::find($id);
        $attendance = Attendance::where('course_id', '=', $id)->get();
        return view('attendance.index', compact('course_id', 'course', 'attendance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $course_id=$id;
        return view('attendance.create', compact('course_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course_id=$request->course_id;
        $course = Courses::find($course_id);
        $students = Students::where('course_id', '=', $course_id)->get();
        $attendanceExists = Attendance::where([['course_id','=',$course_id],['day','=', $request->day]])->first();
        if($attendanceExists == null){
            foreach($students as $s){
                $attendance = new Attendance();
                $attendance->student_name = $s->student_name;
                $attendance->student_id = $s->student_id;
                $attendance->course_id = $s->course_id;
                $attendance->student_phone = $s->student_phone;
                $attendance->day = $request->input('day');
                $attendance->save();
            }
            return \Redirect::route('attendance.index', [$course_id])->with('message', 'Attendance for '.$request->day.' created');
        }
        else{
            return \Redirect::route('attendance.create', [$course_id])->with('messageDanger', 'Attendnace for the chosen day already exists');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $course_id=$id;
        $day = $request->day;
        $course = Courses::find($id);
        $attendance = Attendance::where([['course_id','=',$course_id],['day','=', $day]])->get();
        $attendanceExists = Attendance::where([['course_id','=',$course_id],['day','=', $day]])->first();
        if($attendanceExists == null){
            return \Redirect::route('attendance.index', [$course_id])->with('messageDanger', 'Attendance for '.$day.' not found');
        }
        else{
            return view('attendance.show', [$course_id], compact('course_id', 'course', 'attendance', 'day'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course_id=$request->course_id;
        $day = $request->day;
        $course = Courses::find($course_id);
        $attendance = Attendance::where([['course_id','=',$course_id],['day','=', $day]])->get();
        $attend = Attendance::find($id);
        $attend->hasAttended = $request->input('hasAttended');
        $attend->save();
        return view('attendance.show', [$course_id], compact('course_id', 'course', 'attendance', 'day'))->with('message', 'Attendance updated');
        // return \Redirect::route('attendance.index', [$course_id], compact('course'))->with('messageDanger', 'Attendance Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
