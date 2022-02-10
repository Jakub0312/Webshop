@extends('layouts.layout')

@section('topmenu')

@endsection

@section('alert')

    @if(session('message'))
        <div class="bg-customgreen-light text-customgreen-dark rounded-lg shadow-md p-6 mb-8">
            {{ session('message') }}
        </div>

    @endif

@endsection


@section('main')

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-20 mr-auto">
        Products
    </h2>
    <div class="flex flex-wrap ml-64 mr-auto">
            @foreach($products as $product)
                <div class="w-full md:w-1/3 xl:w-1/5 p-6 flex flex-col float-right m-1 border-2 rounded-lg overflow-hidden">
                    <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                        <img class="hover:grow hover:shadow-lg"
                             src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png">
                        <div class="pt-3 flex items-center justify-between">
                            <h2 class="font-bold text-xl">{{ $product->name }}</h2>
                        </div>
                        <p class="pt-1 text-gray-900">{{ $product->description }}</p>
                        <p class="pt-1 text-gray-900 bold text-xl">€{{ $product->latest_price->price }}
                            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}">
                        <button class="bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded float-right none text-sm">
                            Add to cart
                        </button></a>
                        </p>
                    </a>
                </div>
            @endforeach
            </div>

    <!-- <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            @foreach ($products as $product)

                <div class="p-4 xl:w-1/4 md:w1/2 w-full">
                    <div
                        class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">

                        <h1 class="text-3xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none">
                            {{ $product->name }} </h1>
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium">Category: {{ $product->category->name }}</h2>

                        <p class="flex items-center text-gray-600 mb-6">
                            <span class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2.5" class="w-3 h-3" viewBox="0 0 24 24">
                                    <path d="M20 6L9 17l-5-5"></path>
                                </svg>
                            </span>
                            {{ $product->latest_price->price }}
                        </p>
                        <p class="flex justify-center text-gray-600 mb-6">
                            {{ Str::limit($product->description, 150) }}
                        </p>
                        <div class="flex justify-center">
                            <button class="bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded float-right none text-sm">Add to Cart</button>
                            <a href="{{ route('public.product.index', ['product-id']) }}"> <button class="ml-4 inline-flex text-gray-700
                                bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Details</button> </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section> -->

@endsection
