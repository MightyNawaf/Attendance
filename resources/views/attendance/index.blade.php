@extends('layouts.admin')
@section('content')
<h1 class="text-right">Attendance of {{$course->course_name}}</h1>
<div class="card"></div>
@if(session()->has('message'))
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('messageDanger'))
    <div class="alert alert-danger text-center">
        {{ session()->get('messageDanger') }}
    </div>
@endif
{{-- Add button --}}
<div class="card" style="width: 18rem;">      
    <div class="card-body">
      <h5 class="card-title">Create a New Attendance</h5>
      <br><br>
      <a href="{{route('attendance.create', $course->id)}}" class="btn btn-primary mb-">Create</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">      
    <div class="card-body">
      <h5 class="card-title">View Attendace</h5>
      <form action="{{route('attendance.show', $course->id)}}" method="POST">
        @csrf
        @method('POST')
          <div class="form-outline mb-4">
            <label class="form-label" for="form4Example2">Select a Day:</label>
            <input type="date" name="day" id="form4Example2" class="form-control" />
          </div>      
          <button type="submit" class="btn btn-success">Find</button>
      </form>
    </div>
  </div>
@endsection