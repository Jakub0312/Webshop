@extends('layouts.layout')

@section('main')

    @if(session('message'))
        <div class="bg-customgreen-light text-customgreen-dark rounded-lg shadow-md p-6 mb-8">
            {{ session('message') }}
        </div>

    @endif

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

                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}">
                    <button class="bg-customgreen hover:bg-customgreen-dark text-white font-bold py-4 px-6 rounded float-right text-sm mt-0">
                        Add to cart
                    </button></a>
            <br>
            <br>
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
