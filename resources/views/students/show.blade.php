<style>
  table {
  counter-reset: section;
}

.count:before {
  counter-increment: section;
  content: counter(section);
}
</style>
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
      <th scope="col">Name</th>
      <th scope="col">University ID</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($students as $s)
        
    <tr>
      <th scope="row" class="count"></th>
      <td>{{$s->student_name}}</td>
      <td>{{$s->student_id}}</td>
      <td>
        <a type="submit" href="{{route('students.edit', $s->id)}}" class="btn btn-success">Edit</a>
        <a type="submit" href="{{route('students.destroy', $s->id)}}" class="btn btn-danger">Delete</a> 
      </form> 
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection