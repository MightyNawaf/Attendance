@extends('layouts.admin')
@section('content')
<h1 class="text-right">Courses</h1>
<div class="card"></div>
@foreach ($courses as $c)
<div class="card" style="width: 18rem;">      
    <div class="card-body">
      <h5 class="card-title">{{$c->course_name}}</h5>
      <p class="card-text">{{date('d-m-Y', strtotime($c->start_date))}}</p>
      <p class="card-text">to</p>
      <p class="card-text">{{date('d-m-Y', strtotime($c->end_date))}}</p>
      <a href="{{route('courses.show', $c->id)}}" class="btn btn-primary">View</a>
      <a href="{{route('courses.edit', $c->id)}}" class="btn btn-success">Edit</a>
      <a type="submit" href="{{route('courses.destroy', $c->id)}}" class="btn btn-danger">Delete</a> 
    </div>
  </div>
  @endforeach
{{-- Add button --}}
<div class="card"></div>
<a href="{{route('courses.create')}}" class="btn btn-primary btn-block mb-4">Add new course</a>
@endsection