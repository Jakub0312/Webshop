@extends('layouts.layout')

@section('topmenu')
    <nav
        class="flex flex-row justify-between border-b
                dark:border-gray-600 dark:text-gray-400 transition duration-500
                ease-in-out">
        <div class="flex ml-50">
            <!-- Top NavBar -->
            <a
                href=""
                class="ml-44 py-2 block text-customgreen-dark border-customgreen-dark
                        dark:text-customgreen-light dark:border-customgreen-light
                        focus:outline-none border-b-2 font-medium capitalize
                        transition duration-500 ease-in-out">
                Overzicht
            </a>
            <button
                class="ml-6 py-2 block border-b-2 border-transparent
                        focus:outline-none font-medium capitalize text-center
                        focus:text-green-500 focus:border-customgreen
                        dark-focus:text-customgreen-light dark-focus:border-customgreen-light
                        transition duration-500 ease-in-out">
                <a href="{{ route('productstates.create') }}">Toevoegen</a>
            </button>
        </div>
    </nav>
@endsection


@section('main')

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-20 mr-auto">
        Overzicht productstates
    </h2>

    @if(session('message'))
        <div class="bg-customgreen-light text-customgreen-dark rounded-lg shadow-md p-6 mb-8">
            {{ session('message') }}
        </div>

    @endif

    <div class="table w-full p-2 mt-15">
        <table class="w-full border">
            <thead>
            <tr class="bg-gray-50 border-b">

                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        ID
                    </div>
                </th>

                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        Name
                    </div>
                </th>

                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        Details
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        Edit
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                    <div class="flex items-center justify-center">
                        Delete
                    </div>
                </th>

            </tr>
            </thead>
            <tbody>

            @foreach($productstates as $productstate)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-700">
                    <td class="p-2 border-r">{{ $productstate->id }}</td>
                    <td class="p-2 border-r">{{ $productstate->name }}</td>
                    <td class="p-2 border-r">
                        <a href="{{ route('productstates.show', ['productstate' => $productstate->id])  }}"
                           class="px-4 py-1 text-sm text-customgreen-dark bg-customgreen-light rounded-full">Details</a>
                    </td>
                    <td class="p-2 border-r">
                        <a href="{{ route('productstates.edit', ['productstate' => $productstate->id])  }}"
                           class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                    </td>
                    <td class="p-2 border-r">
                        <a href="{{ route('productstates.delete', ['productstate' => $productstate->id])  }}"
                           class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
