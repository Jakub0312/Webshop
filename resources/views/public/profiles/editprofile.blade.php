@extends('layouts.layout')

@section('main')

    <div class="flex justify-center mt-10">
        <form class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4"
              action="{{ route('profile.updateprofile', ['user' => $user->id]) }}" method="POST">
            @method('PUT')
            @csrf

            <h2 class="my-4 text-2xl font-bold mb-2 text-gray-700 ">
                Edit profile
            </h2>

            @if($errors->any())
            <div class="bg-red-200 text-red-200 rounded-lg shadow-md p-6 pr-10 mb-8">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                               @error('name') border-red-500 @enderror"
                       id="name" type="text" placeholder="Naam" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                               @error('email') border-red-500 @enderror"
                       id="email" type="text" placeholder="Email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
