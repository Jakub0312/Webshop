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
                    <a href="#">
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
@endsection
