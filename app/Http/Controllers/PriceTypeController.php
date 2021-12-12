<?php

namespace App\Http\Controllers;

use App\Models\PriceType;
use App\Http\Requests\StorePriceTypeRequest;
use App\Http\Requests\UpdatePriceTypeRequest;

class PriceTypeController extends Controller
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
     * @param  \App\Http\Requests\StorePriceTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriceTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceType  $priceType
     * @return \Illuminate\Http\Response
     */
    public function show(PriceType $priceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceType  $priceType
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceType $priceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceTypeRequest  $request
     * @param  \App\Models\PriceType  $priceType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceTypeRequest $request, PriceType $priceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceType  $priceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceType $priceType)
    {
        //
    }
}
