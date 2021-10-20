@extends('layouts.admin')
@section('content')
<h1 class="text-right">Edit Student</h1>
<div class="card"></div>
<form method="POST" action="{{route('students.update', $student->id)}}">
    @csrf
    <!-- Student Name input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Student Name:</label>
        <input type="text" for="student_name" value="{{$student->student_name}}" name="student_name" class="form-control" />
    </div>
  
    <!-- Student ID input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example2">Student ID:</label>
        <input type="text" name="student_id" value="{{$student->student_id}}" id="form4Example2" class="form-control" />
    </div>
    <div class="form-outline mb-4">
      <label class="form-label" for="form4Example2">Student Phone Number:</label>
      <input type="text" name="student_phone" value="{{$student->student_phone}}" id="form4Example2" class="form-control" />
    </div>


    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
  </form>
@endsection