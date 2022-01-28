@extends('layouts.layout')

@section('main')
    @if (Session::has('cart'))
        <div class="table w-1/2 p-2 mt-15 mr-auto ml-auto">
            <table class="w-full border">
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
                    <th class="p-2 border-r cursor-pointer text-sm font-semibold text-gray-700">
                        <div class="flex items-center justify-center">
                            Delete
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
                        <td class="p-2 border-r ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </td>
                    </tr>
        @endforeach
                </tbody>
            </table>

            <section class="float-right mt-10">
            <p class="bold text-xl">Total Price</p>
            <p> €{{ $totalPrice}}</p>

            <a href="{{ route('carts.checkout') }}">
                <button class="bg-customgreen-mid hover:bg-customgreen-dark text-white font-bold py-3 px-5 rounded float-right none text-l mt-3">
                    Checkout
                </button>
            </a>
            </section>
    @else
                <div class="alert flex flex-row items-center bg-blue-200 p-5 rounded border-b-2 border-blue-300 ml-auto mr-auto w-1/2 mt-20">
                    <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-blue-500">
					<svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
						<path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                              clip-rule="evenodd"></path>
					</svg>
				</span>
                    </div>
                    <div class="alert-content ml-4">
                        <div class="alert-title font-semibold text-lg text-blue-800">
                            Info
                        </div>
                        <div class="alert-description text-sm text-blue-600">
                            There are no items in your cart!
                        </div>
                    </div>
                </div>
    @endif
@endsection
