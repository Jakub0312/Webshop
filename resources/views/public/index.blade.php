@extends('layouts.layout')

@section('alert')

    @if(session('message'))
        <div class="bg-customgreen-light text-customgreen-dark rounded-lg shadow-md p-6 mb-8">
            {{ session('message') }}
        </div>

    @endif

@endsection

@section('main')

    @if (Auth::check())
        <h1>Welcome back {{ Auth::user()->name }}</h1>
    @endif


@endsection
