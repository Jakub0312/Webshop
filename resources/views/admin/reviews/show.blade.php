@extends('layouts.layout')

@section('topmenu')
    <nav
        class="flex flex-row justify-between border-b
                dark:border-gray-600 dark:text-gray-400 transition duration-500
                ease-in-out">
        <div class="flex ml-50">
            <!-- Top NavBar -->
            <button
                class="ml-44 py-2 block border-b-2 border-transparent
                        focus:outline-none font-medium capitalize text-center
                        focus:text-green-500 focus:border-customgreen
                        dark-focus:text-customgreen-light dark-focus:border-customgreen-light
                        transition duration-500 ease-in-out">
                <a href="{{ route('reviews.index') }}">Overview</a>
            </button>
        </div>
    </nav>
@endsection


@section('main')

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-20 mr-auto">
        Details reviews
    </h2>

    <!-- component -->
    <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden my-4 ml-40">
        <img class="w-full h-56 object-cover object-center" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <h1 class="mx-3 text-white font-semibold text-lg">Review</h1>
        </div>
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">Review id: {{ $review->id }}</h1>
            <h2 class="py-2 text-lg text-gray-700">Product: {{ $review->product->name }}</h2>
            <h2 class="py-2 text-lg text-gray-700">User: {{ $review->user->name }}</h2>
            <h2 class="py-2 text-lg text-gray-700">Title: {{ $review->title }}</h2>
            <p class="py-2 text-lg text-gray-700">Review : {{ $review->review }}</p>
        </div>
    </div>

@endsection
