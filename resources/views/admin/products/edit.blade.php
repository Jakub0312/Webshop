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

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-80 mr-auto">
        Edit product
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

        <form class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4"
              action="{{ route('products.update', ['product' => $product->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Naam
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('name') border-red-500 @enderror"
                       id="name" type="text" placeholder="Naam" name="name" value="{{ old('name', $product->name) }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Description
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                    focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror" name="description"
                    id="description" required>{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Specifications
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                    focus:outline-none focus:shadow-outline @error('specifications') border-red-500 @enderror" name="specifications"
                    id="specifications" required>{{ old('specifications', $product->specifications) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    ProductState
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                    focus:outline-none focus:shadow-outline @error('productstate_id') border-red-500 @enderror" name="productstate_id"
                    id="productstate_id" required>{{ old('productstate_id') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Stock
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                    focus:outline-none focus:shadow-outline @error('stock') border-red-500 @enderror" name="stock"
                    id="stock" value="{{ old('stock', $product->stock) }}" type="text" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">
                    Price
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                    focus:outline-none focus:shadow-outline @error('price') border-red-500 @enderror" name="price"
                    id="price" value="{{ old('price', $product->latest_price->price) }}" type="text" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                    Category
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                    focus:outline-none focus:shadow-outline" name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>




            <div class="flex items-center justify-between">
                <button class="bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                    Edit
                </button>
            </div>
        </form>
    </div>

@endsection
