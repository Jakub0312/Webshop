@extends('layouts.layout')

@section('main')

    <div class="flex justify-center mt-10">
        <form class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4 w-1/4 ml-10"
              action="{{ route('profile.storeaddress') }}" method="POST">
            @csrf

            <h2 class="my-4 text-2xl font-bold mb-2 text-gray-700 ">
                Add address
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
                <label class="block text-gray-700 text-sm font-bold mb-2" for="streetname">
                    Street name + house number
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('streetname') border-red-500 @enderror"
                       id="streetname" type="text" placeholder="Street name + house number" name="streetname" value="{{ old('streetname') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                    City
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('city') border-red-500 @enderror"
                       id="city" type="text" placeholder="City" name="city" value="{{ old('city') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="zipcode">
                    Zip code
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                           @error('zipcode') border-red-500 @enderror"
                       id="zipcode" type="text" placeholder="Zipcode" name="zipcode" value="{{ old('zipcode') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
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
                <label class="block text-gray-700 text-sm font-bold mb-2" for="addresstype">
                    Address type
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="addresstype" id="addresstype" required>
                    @foreach($addresstypes as $addresstype)
                        <option value="{{ $addresstype->id }}"
                                @if( old('addresstype') == $addresstype->id)
                                selected
                            @endif
                        >{{ $addresstype->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button class="mt-2 bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                    Add address
                </button>
            </div>
        </form>

@endsection
