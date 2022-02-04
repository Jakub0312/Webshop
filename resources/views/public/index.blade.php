@extends('layouts.layout')

@section('main')

    @if (Auth::check())
        <h1>Welcome back {{ Auth::user()->name }}</h1>
    @endif


@endsection
