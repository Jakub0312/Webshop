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
            <h1 class="mx-3 text-white font-semibold text-lg">Your Profile</h1>
        </div>
        <form class="bg-white px-8 pt-6 pb-8 mb-4"
              action="{{ route('profile.destroyProfile', ['user' => $user->id]) }}" method="POST">
            @method('DELETE')
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('name') border-red-500 @enderror"
                       id="name" type="text" placeholder="Name" name="name" value="{{ old('name', $user->name) }}" disabled>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('email') border-red-500 @enderror"
                       id="email" type="email" placeholder="email" name="email" value="{{ old('email', $user->email) }}" disabled>
            </div>

            @if (isset($address))
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                    Address
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('email') border-red-500 @enderror"
                       id="address" type="text" placeholder="address" name="address" value="{{ old('address', $address->address) }}" disabled>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                    City
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('city') border-red-500 @enderror"
                       id="city" type="text" placeholder="city" name="city" value="{{ old('city', $address->city) }}" disabled>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                    Country
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('country') border-red-500 @enderror"
                       id="country" type="text" placeholder="country" name="country" value="{{ old('country', $address->country) }}" disabled>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="zipcode">
                    Zipcode
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('zipcode') border-red-500 @enderror"
                       id="zipcode" type="text" placeholder="zipcode" name="zipcode" value="{{ old('zipcode', $address->zipcode) }}" disabled>
            </div>

            @endif
                    <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-5 rounded none text-l mt-3">
                        Delete profile
                    </button>
        </form>
    </div>


@endsection
