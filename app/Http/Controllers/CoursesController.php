<?php

namespace App\Http\Controllers;
use App\Models\Courses;
use Illuminate\Http\Request;
use Auth;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $courses = Courses::where('user_id', '=', $id)->get();
        return view('courses.index', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses = new Courses();
        $courses->course_name = $request->input('course_name');
        $courses->user_id = Auth::user()->id;
        $courses->start_date = $request->input('start_date');
        $courses->end_date = $request->input('end_date');
        // $courses->isActive = $request->input('isActive');
        $courses->save();
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
        $course = Courses::find($id);

        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::find($id);
        return view('courses.edit', compact('course'));
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
        $courses = Courses::find($id);
        $courses->course_name = $request->input('course_name');
        $courses->start_date = $request->input('start_date');
        $courses->end_date = $request->input('end_date');
        $courses->save();
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
    $course = Courses::find($id);
    $course->delete();
    return redirect()->route('courses.index');
    }
}
