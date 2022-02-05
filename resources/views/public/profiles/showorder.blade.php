@extends('layouts.layout')

@section('topmenu')
    <a href="{{ url()->previous() }}">
    <button class="border border-customgreen-mid text-customgreen-mid block rounded-sm font-bold py-2 px-4 mr-2 ml-20 flex items-center hover:bg-customgreen-mid hover:text-white">
        <svg class="h-5 w-5 mr-2 fill-current" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
        </svg>
        Previous page
    </button>
    </a>
@endsection

@section('main')

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-20 mr-auto">
        Your order
    </h2>

    <!-- component -->
    <div class="max-w-xl bg-white shadow-lg rounded-lg overflow-hidden my-4 ml-auto mr-auto">
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <h1 class="mx-3 text-white font-semibold text-lg">Order</h1>
        </div>
        <div class="py-4 px-6">
            <p class="py-1 text-lg text-gray-700 mt-1 font-semibold inline-block">Order status: </p>
            <p class="py-2 text-lg text-gray-700 inline-block">{{ $order->state->name }}</p><br>
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
                @endforeach

                </tbody>
            </table>

            <a href="{{ route('profile.cancelorder', ['order' => $order->id]) }}">
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-5 rounded none text-l mt-3">
                    Cancel order!
                </button>
            </a>

        </div>
    </div>

@endsection
