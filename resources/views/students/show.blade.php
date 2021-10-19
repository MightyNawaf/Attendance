@extends('layouts.admin')
@section('content')
<h1 class="text-right">Students of {{$course->course_name}}</h1>

{{-- Add button --}}
<div class="card"></div>
<a href="{{route('students.create', $course_id)}}" class="btn btn-primary btn-block mb-4">Add a new student</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Attendance</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($students as $s)
        
    <tr>
      <th scope="row">{{$s->id}}</th>
      <td>{{$s->student_name}}</td>
      <td>{{$s->student_id}}</td>
      <td>
        <form action="{{route('courses.update', $s->id)}}">
        <button type="submit" class="btn btn-success">Make Present</button>
        <button type="submit" class="btn btn-danger">Make Absent</button> 
      </form> 
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection