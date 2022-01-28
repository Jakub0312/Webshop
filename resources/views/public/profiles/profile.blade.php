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
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">Personal information</h1>
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Name: </p>
            <p class="py-1 text-lg text-gray-700 inline-block">{{ $user->name }}</p><br>
            <p class="py-1 text-lg text-gray-700 font-semibold inline-block">Email:</p>
            <p class="py-1 text-lg text-gray-700 inline-block"> {{ $user->email }}</p><br>
            <a href="{{ route('profile.editprofile') }}">
                <button class="bg-yellow-200 hover:bg-yellow-300 text-yellow-500 font-bold py-3 px-5 rounded none text-l mt-3">
                    Edit profile
                </button>
            </a>
        </div>
        <div class="flex items-center px-6 py-1 bg-gray-100">
        </div>
        <div class="py-4 px-6 ">
            <h1 class="text-2xl font-semibold text-gray-800">Address</h1>
            @if (isset($address))
                <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Address: </p>
                <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->address }}</p><br>
                <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Country: </p>
                <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->country }}</p><br>
                <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">City: </p>
                <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->city }}</p><br>
                <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Zipcode:  </p>
                <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->zipcode }}</p><br>
                <a href="{{ route('profile.editaddress') }}">
                    <button class="bg-yellow-200 hover:bg-yellow-300 text-yellow-500 font-bold py-3 px-5 rounded none text-l mt-3">
                        Edit address
                    </button>
                </a>
            @else
                <p class="py-1 text-lg text-gray-700">You don't have an address linked to your account.<br> Please add an address!</p>
                <a href="{{ route('profile.addaddress') }}">
                    <button class="bg-customgreen-mid hover:bg-customgreen-dark text-white font-bold py-3 px-5 rounded none text-l mt-3">
                        Add address
                    </button>
                </a>
            @endif

        </div>
    </div>

@endsection
