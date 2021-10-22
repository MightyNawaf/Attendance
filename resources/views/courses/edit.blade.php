@extends('layouts.admin')
@section('content')
<h1 class="text-right">Edit Course</h1>
<div class="card"></div>
<form method="POST" action="{{route('courses.update', $course->id)}}">
    @csrf
    {{method_field('PUT')}}
    <!-- Course Name input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Course Name:</label>
      <input type="text" for="course_name" value="{{$course->course_name}}" name="course_name" class="form-control" />
    </div>
  
    <!-- Start date input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example2">Number of Days:</label>
      <input type="text" name="days" value="{{$course->days}}" id="form4Example2" class="form-control" />
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mt-4">Save</button>
  </form>
@endsection