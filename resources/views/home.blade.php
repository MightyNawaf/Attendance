@extends('layouts.admin')
@section('content')
    <h1 class="text-center">Home</h1>
    <div class="card"></div>
    <div class="card center" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">There are X courses</h5>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
          <a href="{{route('courses.index')}}" class="btn btn-primary">View</a>
        </div>
      </div>
@endsection