@extends('layouts.admin')
@section('content')
<h1 class="text-right">Create a New Course</h1>
<div class="card"></div>
<form method="POST" action="{{route('courses.store')}}">
    @csrf
    <!-- Course Name input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Course Name:</label>
      <input type="text" for="course_name" name="course_name" class="form-control" />
    </div>
  
    <!-- Start date input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example2">Start Date:</label>
      <input type="date" name="start_date" id="form4Example2" class="form-control" />
    </div>
    <!-- End date input -->
    <div class="form-outline mb-4">
        <label class="form-label" for="form4Example2">End Date:</label>
      <input type="date" name="end_date" id="form4Example2" class="form-control" />
    </div>
  
    <!-- Checkbox -->
                {{-- <div class="form-check d-flex justify-content-center mb-4">
                <input
                    class="form-check-input me-2"
                    type="checkbox"
                    name="isActive"
                    value="0"
                    id="form4Example4"
                />
                <label class="form-check-label" for="form4Example4">
                    Make this course deactivated
                </label>
                </div> --}}
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
  </form>
@endsection