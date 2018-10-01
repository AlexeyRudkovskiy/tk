@extends('layout.theme')
@section('title', trans('app.employees.single_title'))
@section('content')
    @include('employees.employer', [ 'employer' => $employer, 'detailed' => true ])
    {!! $employer->getDescriptionFormatted() !!}
@endsection