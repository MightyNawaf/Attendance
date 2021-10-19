@extends('layouts.admin')
@section('content')
<h1 class="text-right">Students of {{$course->course_name}}</h1>
<div class="card"></div>

{{-- Add button --}}
<div class="card"></div>
<a href="{{route('students.create')}}" class="btn btn-primary btn-block mb-4">Add a new student</a>
@endsection