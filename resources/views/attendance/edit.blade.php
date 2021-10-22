@extends('layouts.admin')
@section('content')
<h1 class="text-right"></h1>
<div class="card"></div>
@if(session()->has('messageDanger'))
    <div class="alert alert-danger text-center">
        {{ session()->get('messageDanger') }}
    </div>
@endif
<form method="POST" action="{{route('attendance.store')}}">
    @csrf
    <!-- Student Name input -->
    <div class="form-outline mb-4">
      <label class="form-label" for="form4Example2">Select a Day:</label>
    <input type="date" name="day" id="form4Example2" class="form-control" />
  </div>    
    <input type="hidden" name="course_id" value="{{$course_id}}" id="form4Example2" class="form-control" />
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
  </form>
@endsection