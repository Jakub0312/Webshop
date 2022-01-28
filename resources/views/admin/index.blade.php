@extends('layouts.layout')

@section('main')

    <h2 class="my-4 text-3xl font-semibold dark:text-gray-400 ml-20 mr-auto">
        Admin
    </h2>

    <a class="px-4 py-2 mt-5 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent  dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4"
       href="{{ route('productstates.index') }}">Product states</a><br>

    <a class="px-4 py-2 mt-5 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent  dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4"
       href="{{ route('pricetypes.index') }}">Price types</a><br>

    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent  dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4"
       href="{{ route('users.index') }}">Users</a><br>

    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent  dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4"
       href="{{ route('orders.index') }}">Orders</a><br>

    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent  dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4"
       href=" {{ route('orderrows.index') }}">Orderrows</a><br>

    <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent  dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4"
       href=" {{ route('reviews.index') }}">Reviews</a><br>

@endsection
