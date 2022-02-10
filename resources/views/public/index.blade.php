@extends('layouts.layout')

@section('alert')

    @if(session('message'))
        <div class="bg-customgreen-light text-customgreen-dark rounded-lg shadow-md p-6 mb-8">
            {{ session('message') }}
        </div>

    @endif

@endsection

@section('main')



    <div class="w-60 h-full shadow-md bg-white px-1 absolute">
        <ul class="relative">
            @if (Auth::check())
                <h1 class="my-4 text-2xl font-semibold">Welcome back
                    {{ Auth::user()->name }}</h1>
            @endif
        </ul>
    </div>


    <h2 class="my-4 text-3xl font-semibold text-center">
        Products that may interest you
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
                    <p class="pt-1 text-gray-900 overflow-hidden h-20">{{ $product->description }}</p>
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
@endsection
