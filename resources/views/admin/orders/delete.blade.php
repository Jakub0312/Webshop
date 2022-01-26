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
                class="ml-44 py-2 block border-b-2 border-transparent
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

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-80 mr-auto">
        Delete order
    </h2>

    <div class="w-full max-w-xs mx-auto mt-44">



        @if($errors->any())
            <div class="bg-red-200 text-red-200 rounded-lg shadow-md p-6 pr-10 mb-8">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="bg-white shadow-md rounded border .border-customgreen px-8 pt-6 pb-8 mb-4"
              action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Date
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                       @error('orderdate') border-red-500 @enderror"
                       id="orderdate" type="datetime-local" placeholder="Order date" name="orderdate" value="{{ old('orderdate', $order->orderdate) }}" disabled>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    User
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="user_id" id="user_id" disabled>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                                @if( old('user_id', $order->user_id) == $user->id)
                                selected
                            @endif
                        >{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{--Choose order state--}}
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Order state
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="state_id" id="state_id" disabled>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}"
                                @if( old('state_id', $order->state_id) == $state->id)
                                selected
                            @endif
                        >{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-customgreen hover:bg-customgreen-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
                    Delete
                </button>
            </div>
        </form>
    </div>

@endsection
