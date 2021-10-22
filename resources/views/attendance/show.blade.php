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
      @if(session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session()->get('message') }}
            </div>
        @endif
{{-- Add button --}}
<div class="card"></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">University ID</th>
      <th scope="col">Attendance Status</th>
      <th scope="col">Edit Attendance</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($attendance as $s)

    <tr>
      <th scope="row" class="count"></th>
      <td>{{$s->student_name}}</td>
      <td>{{$s->student_id}}</td>
      <td>
        
        @if ($s->hasAttended == 0)
          Absent
        @endif 
        @if ($s->hasAttended == 1)
          Present
        @endif
      </td>
      <td>
        <form id="form" action="{{route('attendance.update', $s->id)}}" method="POST">
            @csrf
            <input type="hidden" name="course_id" value="{{$course_id}}">
            <input type="hidden" name="day" value="{{$day}}">
            <button type="submit" name="hasAttended" value="1" class="btn btn-success">Present</button> 
            <button type="submit" name="hasAttended" value="0" class="btn btn-danger">Absent</button> 
        </form> 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}</script>
@endsection
