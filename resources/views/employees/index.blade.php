@extends('layout.theme')

@section('title', trans('app.employees.title'))
@section('content')
    <div class="employees-list">
        @foreach($employees as $employer)
            @include('employees.employer', [ 'employer' => $employer ])
        @endforeach
    </div>
@endsection