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
                <a href="{{ route('orders.index') }}">Overview</a>
            </button>
            <button
                class="ml-6 py-2 block border-b-2 border-transparent
                        focus:outline-none font-medium capitalize text-center
                        focus:text-green-500 focus:border-customgreen
                        dark-focus:text-customgreen-light dark-focus:border-customgreen-light
                        transition duration-500 ease-in-out">
                <a href="{{ route('orders.create') }}">Create</a>
            </button>
        </div>
    </nav>
@endsection


@section('main')

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-20 mr-auto">
        Show order
    </h2>

    <!-- component -->
    <div class="max-w-xl bg-white shadow-lg rounded-lg overflow-hidden my-4 ml-auto mr-auto">
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <h1 class="mx-3 text-white font-semibold text-lg">Order</h1>
        </div>
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">Order id: {{ $order->id }}</h1>
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Customer: </p>

            <p class="py-2 text-lg text-gray-700 inline-block">{{ $order->user->name }}</p><br>
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Address: </p>
            <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->address }}</p><br>
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Country: </p>
            <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->country }}</p><br>
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">City: </p>
            <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->city }}</p><br>
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Zipcode:  </p>
            <p class="py-1 text-lg text-gray-700 inline-block">{{ $address->zipcode }}</p><br><br>
            <h3 class="text-gray-700 font-semibold text-lg">Products Ordered:</h3>
            <table class="w-full border">
                <thead>
                <tr class="bg-gray-50 border-b">

                    <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                        <div class="flex items-center justify-center">
                            Product
                        </div>
                    </th>

                    <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                        <div class="flex items-center justify-center">
                            Amount
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

                @foreach($orderrows->where('order_id', $order->id) as $orderrow)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-700">
                        <td class="p-2 border-r">
                            {{ $orderrow->product->name }}
                        </td>
                        <td class="p-2 border-r">
                            {{ $orderrow->amount }}
                        </td>
                        <td class="p-2 border-r">
                            <a href="{{ route('orderrows.edit', ['orderrow' => $orderrow->id])  }}"
                               class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full">Edit</a>
                        </td>
                        <td class="p-2 border-r">
                            <a href="{{ route('orderrows.delete', ['orderrow' => $orderrow->id])  }}"
                               class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full">Delete</a>
                        </td>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection
