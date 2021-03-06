@extends('layouts.admin')
@section('content')
<h1 class="text-right">{{$course->course_name}}</h1>
<div class="card"></div>
<div class="card" style="width: 18rem;">      
    <div class="card-body">
      <h5 class="card-title">Students</h5>
      <a href="{{route('students.show', $course->id)}}" class="btn btn-primary"> View </a>
    </div>
</div>
<div class="card"></div>
<div class="card" style="width: 18rem;">      
    <div class="card-body">
      <h5 class="card-title">Attendance</h5>
      <a href="{{route('attendance.index', $course->id)}}" class="btn btn-primary">View</a>
    </div>
</div>
<div class="card"></div>


@endsection