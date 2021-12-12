<?php

namespace App\Http\Controllers;

use App\Models\ProductState;
use App\Http\Requests\StoreProductStateRequest;
use App\Http\Requests\UpdateProductStateRequest;

class ProductStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductStateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductStateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function show(ProductState $productState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductState $productState)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductStateRequest  $request
     * @param  \App\Models\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductStateRequest $request, ProductState $productState)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductState  $productState
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductState $productState)
    {
        //
    }
}
