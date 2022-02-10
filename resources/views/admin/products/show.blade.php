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
                <a href="{{ route('products.index') }}">Overzicht</a>
            </button>
            <button
                class="ml-6 py-2 block border-b-2 border-transparent
                        focus:outline-none font-medium capitalize text-center
                        focus:text-green-500 focus:border-customgreen
                        dark-focus:text-customgreen-light dark-focus:border-customgreen-light
                        transition duration-500 ease-in-out">
                <a href="{{ route('products.create') }}">Toevoegen</a>
            </button>
        </div>
    </nav>
@endsection


@section('main')

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-20 mr-auto">
        Show products
    </h2>

    <!-- component -->
    <div class="max-w-xl bg-white shadow-lg rounded-lg overflow-hidden my-4 ml-auto mr-auto">
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <h1 class="mx-3 text-white font-semibold text-xl">{{ $product->name }}</h1>
        </div>
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">Product Information</h1>
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Name: </p>
            <p class="py-1 text-lg text-gray-700 inline-block">{{ $product->name }}</p><br>
            <br>
            <p class="py-1 text-lg text-gray-700 font-semibold inline-block">Category:</p>
            <p class="py-1 text-lg text-gray-700 inline-block"> {{ $product->category->name }}</p><br>
            <br>
            <p class="py-1 text-lg text-gray-700 font-semibold inline-block">Stock:</p>
            <p class="py-1 text-lg text-gray-700 inline-block"> {{ $product->stock }}</p><br>


        </div>
        <div class="flex items-center px-6 py-1 bg-gray-100">
        </div>
        <div class="py-4 px-6">
            <p class="py-1 text-lg text-gray-700 font-semibold inline-block">Description:</p>
            <p class="py-1 text-lg text-gray-700 inline-block"> {{ $product->description }}</p><br>
            <br>
        </div>
        <div class="flex items-center px-6 py-1 bg-gray-100">
        </div>
        <div class="py-4 px-6">
            <p class="py-1 text-lg text-gray-700 font-semibold inline-block">Specifications:</p>
            <p class="py-1 text-lg text-gray-700 inline-block"> {{ $product->specifications}}</p><br>
        </div>
    </div>

@endsection
