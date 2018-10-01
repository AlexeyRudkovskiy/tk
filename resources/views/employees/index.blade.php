@extends('layout.theme')

@section('title', trans('app.employees.title'))
@section('content')
    @foreach($employees as $employer)
        @include('employees.employer', [ 'employer' => $employer ])
    @endforeach
@endsection