@extends('layouts.layout')

@section('main')

    @if (Auth::check())

        <div class="flex justify-center mt-10">
            <form class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4 w-1/4 ml-10"
                  action="{{ route('carts.saveorder') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('name') border-red-500 @enderror"
                           id="name" type="text" placeholder="Name" name="name" value="{{ old('name', Auth::user()->name) }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Email address
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('email') border-red-500 @enderror"
                           id="email" type="email" placeholder="Email" name="email" value="{{ old('email', Auth::user()->email) }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Country
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('country') border-red-500 @enderror"
                           id="country" type="text" placeholder="Country" name="scountry" value="{{ old('street-name', $address->country) }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Street name + house number
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('street-name') border-red-500 @enderror"
                           id="street-name" type="text" placeholder="Street name" name="street-name" value="{{ old('street-name', $address->address) }}" disabled>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        City
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('city') border-red-500 @enderror"
                           id="city" type="text" placeholder="City" name="city" value="{{ old('city' , $address->city) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Zip code
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('zipcode') border-red-500 @enderror"
                           id="zipcode" type="text" placeholder="Zipcode" name="zipcode" value="{{ old('zipcode', $address->zipcode) }}" required>
                </div>

                <div class="flex items-center justify-between">
                    <button class="mt-2 bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                        Place order
                    </button>
                </div>
            </form>

            @else


    <div class="flex justify-center mt-10">
        <form class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4 w-1/4 ml-10"
              action="{{ route('carts.saveorder') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('name') border-red-500 @enderror"
                       id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Email address
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('email') border-red-500 @enderror"
                       id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Country
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="country" id="country" required>
                        <option>Netherlands</option>
                        <option>Belgium</option>
                        <option>Germany</option>
                        <option>France</option>
                        <option>Luxemburg</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Street name + house number
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('street-name') border-red-500 @enderror"
                       id="street-name" type="text" placeholder="Street name" name="street-name" value="{{ old('street-name') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    City
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('name') border-red-500 @enderror"
                       id="name" type="text" placeholder="Name" name="name" value="{{ old('street-name') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Zip code
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('zipcode') border-red-500 @enderror"
                       id="zipcode" type="text" placeholder="Zipcode" name="zipcode" value="{{ old('zipcode') }}" required>
            </div>

            <div class="flex items-center justify-between">
                <button class="mt-2 bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                    Place order
                </button>
            </div>
        </form>


        @endif



        <section class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4 w-1/4 ml-10">
        <table class="w-full border">
            <h3 class="block text-gray-700 text-xl font-bold mb-2">Your Cart</h3>
            <thead>
            <tr class="bg-gray-50 border-b">

                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        Shopping Cart
                    </div>
                </th>

                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        Amount
                    </div>
                </th>

                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        Price
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-700">
                    <td class="p-2 border-r">
                        {{ $product['item']['name'] }}
                    </td>
                    <td class="p-2 border-r">
                        {{ $product['amount'] }}
                    </td>
                    <td class="p-2 border-r">
                        €{{ $product['price']}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

            <p class="bold text-xl">Total Price</p>
            <p> €{{ $totalPrice}}</p>
        </section>
    </div>
@endsection
