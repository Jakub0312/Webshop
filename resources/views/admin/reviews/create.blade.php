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
            <a
                href=""
                class="ml-6 py-2 block text-customgreen-dark border-customgreen-dark
                        dark:text-customgreen-light dark:border-customgreen-light
                        focus:outline-none border-b-2 font-medium capitalize
                        transition duration-500 ease-in-out">
                Create
            </a>
        </div>
    </nav>
@endsection


@section('main')


    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-80 mr-auto">
        Make Review
    </h2>

    <div class="w-full max-w-xs mx-auto mt-44">



        @if($errors->any())
            <div class="bg-red-200 text-red-200 rounded-lg shadow-md p-6 pr-10 mb-8">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4" action="{{ route('reviews.store') }}" method="POST">
            @csrf

            {{--Write Title--}}
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Review title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('title') border-red-500 @enderror"
                       id="title" type="text" placeholder="Title" name="title" value="{{ old('title') }}">
            </div>

            {{--Choose product--}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Product
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="product_id" id="product_id">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                                @if( old('product_id') == $product->id)
                                selected
                            @endif
                        >{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            {{--Write Review--}}
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Write your review
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('review') border-red-500 @enderror"
                           id="review" type="text" placeholder="Review" name="review" value="{{ old('review') }}">
                </div>

            <div class="flex items-center justify-between">
                <button class="bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                    Create
                </button>
            </div>
        </form>
    </div>

@endsection
