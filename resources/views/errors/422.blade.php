@extends('layouts.layout')

@section('main')

    <div class="bg-gradient-to-r from-green-300 to-blue-200">
        <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
                <div class="border-t border-gray-200 text-center pt-8">
                    <h1 class="text-9xl font-bold text-green-400">422</h1>
                    <h1 class="text-6xl font-medium py-8">Unprocessable entity</h1>
                    <p class="text-2xl pb-8 px-12 font-medium">The server was unable to process the contained instructions.</p>
                    <a href="{{ url('/') }}">
                        <button class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                            HOME
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

